<?php

namespace App\Services\Web;

use Cart;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Newsletter;
use App\Models\SiteSetting;
use App\Notifications\NewOrderPlaced;
use App\Services\Web\ProductCartService;
use Illuminate\Validation\ValidationException;

class OrderService
{

    protected $productService;
    protected $couponService;
    protected $shippingService;
    public  function __construct(ProductCartService $productService, CouponService $couponService, ShippingService $shippingService){
        $this->productService = $productService;
        $this->couponService = $couponService;
        $this->shippingService = $shippingService;
    }

    public function checkMinOrderAmount($subtotal)
    {
        $minOrderAmount = SiteSetting::first()?->minimum_order ?? 0;

        if ($subtotal < (float)$minOrderAmount) {
            throw ValidationException::withMessages([
                'min_order_error' => "Minimum order amount is $$minOrderAmount. Orders below this cannot be placed."
            ]);
        }
    }


    public function orderGenerate($orderData)
    {
        return Order::create([
            'customer_name'   => $orderData['customer_name'],
            'customer_email'  => $orderData['customer_email'],
            'customer_phone'  => $orderData['customer_phone'],
            'order_number'      => $orderData['order_number'],
            'user_id'           => $orderData['user_id'],
            'coupon_id'         => $orderData['coupon_id'] ?? null,
            'customer_name'     => $orderData['customer_name'] ?? '',
            'customer_email'    => $orderData['customer_email'] ?? null,
            'customer_phone'    => $orderData['customer_phone'] ?? null,

            'subtotal'          => $orderData['subtotal'],
            'discount'          => $orderData['discount'],
            'shipping_cost'     => $orderData['shipping_cost'],

            'es_ship_courier_service_id' => $orderData['es_ship_courier_service_id'],
            'es_ship_courier_name' =>  $orderData['es_ship_courier_name'],
            'es_ship_delivery_time' => $orderData['es_ship_delivery_time'],
            'es_ship_courier_total_charge' => $orderData['es_ship_courier_total_charge'],

            'billing_address'   => $orderData['billing_address'],
            'shipping_address'  => $orderData['shipping_address'],

            'total_amount'      => $orderData['total_amount'],
            'payment_method'    => $orderData['payment_method'],
            'transaction_id'    => $orderData['transaction_id'],
        ]);
    }

    public function sslCommerzPayload($totalAmount, $transactionId,  array $optional = []): array
    {
        return [
            'total_amount'      => $totalAmount,
            'currency'          => 'USD',
            'tran_id'           => $transactionId,

            'cus_name'          => $optional['cus_name'] ?? 'Customer Name',
            'cus_email'         => $optional['cus_email'] ?? 'customer@mail.com',
            'cus_add1'          => $optional['cus_add1'] ?? 'Customer Address',
            'cus_add2'          => $optional['cus_add2'] ?? '',
            'cus_city'          => $optional['cus_city'] ?? '',
            'cus_state'         => $optional['cus_state'] ?? '',
            'cus_postcode'      => $optional['cus_postcode'] ?? '',
            'cus_country'       => $optional['cus_country'] ?? 'Bangladesh',
            'cus_phone'         => $optional['cus_phone'] ?? '8801XXXXXXXXX',
            'cus_fax'           => $optional['cus_fax'] ?? '',

            'ship_name'         => $optional['ship_name'] ?? 'Store Test',
            'ship_add1'         => $optional['ship_add1'] ?? 'Dhaka',
            'ship_add2'         => $optional['ship_add2'] ?? 'Dhaka',
            'ship_city'         => $optional['ship_city'] ?? 'Dhaka',
            'ship_state'        => $optional['ship_state'] ?? 'Dhaka',
            'ship_postcode'     => $optional['ship_postcode'] ?? '1000',
            'ship_phone'        => $optional['ship_phone'] ?? '',
            'ship_country'      => $optional['ship_country'] ?? 'Bangladesh',

            'shipping_method'   => $optional['shipping_method'] ?? 'NO',
            'product_name'      => $optional['product_name'] ?? 'Computer',
            'product_category'  => $optional['product_category'] ?? 'Goods',
            'product_profile'   => $optional['product_profile'] ?? 'physical-goods',

            'value_a'           => $optional['value_a'] ?? 'ref001',
            'value_b'           => $optional['value_b'] ?? 'ref002',
            'value_c'           => $optional['value_c'] ?? 'ref003',
            'value_d'           => $optional['value_d'] ?? 'ref004',
        ];
    }


    public function validateCartStockQuantities($cart)
    {
        $requestedQuantities = [];
        foreach ($cart as $item) {
            $requestedQuantities[$item->id] = $item->quantity;
        }

        $stockIssues = $this->productService->productCartStockCheck($cart, $requestedQuantities);

        if (!empty($stockIssues)) {
            $failedRowIds = array_column($stockIssues, 'rowId');
            $messages = array_column($stockIssues, 'message');

            // Immediately redirect back and stop further code
            abort(
                redirect()
                    ->route('shopping.cart') // Replace with your cart route name
                    ->withErrors([
                        'stock_errors' => $messages,
                        'out_of_stock_ids' => $failedRowIds,
                    ])
            );
        }

        return $requestedQuantities;
    }

    public function reorder($id)
    {
        $order = Order::with('items.product')->find($id);
        if (!$order || $order->order_status !== 'completed') {
            return; // silently exit if order not found or not completed
        }

        $outOfStockItems = [];

        foreach ($order->items as $detail) {
            $product = $detail->product;
            $quantity = (int) $detail->quantity;

            if (
                !$product ||
                $product->status != 1 ||
                $quantity < 1 ||
                $product->quantity < $quantity
            ) {
                $outOfStockItems[] = $product->id ?? $detail->product_id;
                continue;
            }

            $existingItem = Cart::get($product->id);
            $totalQty = $existingItem ? $existingItem->quantity + $quantity : $quantity;

            if ($totalQty > $product->quantity) {
                $outOfStockItems[] = $product->id;
                continue;
            }

            $productImage = optional($product->firstImage)->image_url;
            $salePrice = $product->sale_price;
            $regularPrice = $product->regular_price;

            $data = [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $salePrice,
                'quantity' => $quantity,
                'attributes' => [
                    'slug' => $product->slug,
                    'regular_price' => $regularPrice,
                    'sale_price' => $salePrice,
                    'product_image' => $productImage,
                    'product_id' => $product->id,
                ],
            ];

            if ($existingItem) {
                Cart::update($product->id, ['quantity' => $quantity]);
            } else {
                Cart::add($data);
            }
        }

        if (!empty($outOfStockItems)) {
            return redirect()->route('shopping.cart')
                ->withInput()
                ->withErrors(['out_of_stock_ids' => $outOfStockItems]);
        }

        $this->couponService->refreshCouponAndValidate((float) Cart::getSubTotal());

        return redirect()->route('checkout')->with('success', 'Reorder successful. Proceed to checkout.');
    }

    public function sendOrderNotification($order)
    {
        $admin = Admin::first();
        if ($admin) {
            $admin->notify(new NewOrderPlaced($order));
        }
    }

    public function newsletterSubscription($email)
    {
        $exists = Newsletter::where('email', $email)->exists();
        if (!$exists) {
            $newsletter = new Newsletter();
            $newsletter->email = $email;
            $newsletter->save();
        }
    }
}
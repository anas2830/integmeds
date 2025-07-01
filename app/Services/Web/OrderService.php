<?php

namespace App\Services\Web;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use App\Models\OrderDetails;
use App\Models\StockLeadger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Session;
use App\Services\Web\ProductCartService;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Cupon;

class OrderService
{

    protected $productService;
    protected $couponService;
    public  function __construct(ProductCartService $productService, CouponService $couponService){
        $this->productService = $productService;
        $this->couponService = $couponService;

    }

    public function placeOrder($request)
    {

        $user = Auth::user();

        $cart = Cart::getContent();

        $subtotal = Cart::getSubTotal();

        $result = $this->validateCartStockQuantities($cart);

        if ($result instanceof RedirectResponse) {
            return $result; // Redirect back with errors
        }

        $this->couponService->refreshCouponAndValidate($subtotal);


        // Extract billing address from request
        $billingAddress = $request->input('billing');

        // By default, shipping address is same as billing
        $shippingAddress = $billingAddress;

        // If user wants to ship to a different address, override shipping address
        if ($request->ship_to_different_address) {
            $shippingAddress = $request->input('shipping');
        }


        // Order basics
        $orderNumber = generateOrderNumber();
        $transactionId = 'TRX-' . uniqid();
        $couponId = Session::get('coupon_id', null);
        $discount = Session::get('coupon_amount', 0);
        $shippingCost = 0;
        $totalAmount = max($subtotal + $shippingCost - $discount, 0);
        $newsLetter = $request->newsletter_subscription;
        if ($newsLetter) {
            $email = $request->customer_email ?? $billingAddress['email'] ?? $shippingAddress['email'] ?? null;

            // Check if email already exists
            $exists = Newsletter::where('email', $email)->exists();

            if (!$exists) {
                $newsletter = new Newsletter();
                $newsletter->email = $email;
                $newsletter->save();
            }
        }


        // Create Order
        $orderData = [
            'order_number'      => $orderNumber,
            'user_id'           => $user?->id,
            'coupon_id'         => $couponId ?? 0,
            'customer_name'     => $user?->name ?? '',
            'customer_email'    => $user?->email ?? null,
            'customer_phone'    => $user?->phone ?? null,
            'subtotal'          => $subtotal,
            'discount'          => $discount,
            'shipping_cost'     => $shippingCost,
            'billing_address'   => $billingAddress,
            'shipping_address'  => $shippingAddress,
            'total_amount'      => $totalAmount,
            'payment_method'    => 'sslcommerz',
            'transaction_id'    => $transactionId,
        ];

        $order = $this->orderGenerate($orderData);

        if (!empty($couponId) && ($coupon = Cupon::find($couponId))) {
            $coupon->increment('used');
        }

        $details = array();
        foreach ($cart as $row) {
            $details['order_id'] = $order->id;
            $details['product_id'] = $row->id;
            $details['quantity'] = $row->quantity;
            $details['product_name'] = $row->name;
            $details['price'] = $row->price;
            $details['subtotal'] = $row->quantity * $row->price;


            OrderDetails::create($details);

            Product::where('id', $row->id)->update([
                'quantity' => DB::raw("quantity - {$row->quantity}")
            ]);

            Inventory::where('product_id', $row->id)->update([
                'quantity' => DB::raw("quantity - {$row->quantity}")
            ]);


            StockLeadger::create([
                'product_id' => $row->id,
                'quantity' => $row->quantity,
                'type' => 'out',
                'note' => "Quantity decreased by customer purchase: - $row->quantity order id $order->id",
            ]);
        }
        

    
        $sslPostData = $this->sslCommerzPayload($totalAmount, $transactionId);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($sslPostData, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }


    private function orderGenerate($orderData)
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

            'billing_address'   => $orderData['billing_address'],
            'shipping_address'  => $orderData['shipping_address'],

            'total_amount'      => $orderData['total_amount'],
            'payment_method'    => $orderData['payment_method'],
            'transaction_id'    => $orderData['transaction_id'],
        ]);
    }

    private function sslCommerzPayload($totalAmount, $transactionId,  array $optional = []): array
    {
        return [
            'total_amount'      => $totalAmount,
            'currency'          => 'BDT',
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

    private function validateCartStockQuantities($cart)
    {
        // Build a map of [rowId => quantity] from the cart
        $requestedQuantities = [];
        foreach ($cart as $item) {
            $requestedQuantities[$item->id] = $item->quantity;
        }

        // Check stock issues using your existing service method
        $stockIssues = $this->productService->productCartStockCheck($cart, $requestedQuantities);

        $failedRowIds = array_column($stockIssues, 'rowId');
        $messages = array_column($stockIssues, 'message');

        if (!empty($messages)) {
            return back()->withErrors([
                'stock_errors' => $messages,
                'out_of_stock_ids' => $failedRowIds,
            ]);
        }

        // If no errors, return requested quantities for further processing
        return $requestedQuantities;
    }

}
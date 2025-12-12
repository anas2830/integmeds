<?php

namespace App\Http\Controllers\Web;

use Cart;
use App\Models\Cupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\OrderDetails;
use App\Models\StockLeadger;
use Illuminate\Http\Request;
use App\Jobs\SendOrderInvoice;
use App\Models\ShippingMethod;
use App\Services\Web\OrderService;
use Illuminate\Support\Facades\DB;
use App\Services\Web\CouponService;
use App\Http\Controllers\Controller;
use App\Jobs\CreateEasyshipShipment;
use Illuminate\Support\Facades\Auth;
use App\Jobs\CreateShippingEasyOrder;
use App\Services\Web\ShippingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrderPlaceRequest;
use App\Library\SslCommerz\SslCommerzNotification;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    protected $orderService;
    protected $couponService;
    protected $shippingService;


    public function __construct(OrderService $orderService, CouponService $couponService, ShippingService $shippingService)
    {
        $this->orderService = $orderService;
        $this->couponService = $couponService;
        $this->shippingService = $shippingService;
    }
    public  function placeOrder(OrderPlaceRequest $request)
    {
        $availableMethods = ShippingMethod::where('status', 1)->get();
        $isShippingRequired = false;
        $ship_to_different_address = $request->ship_to_different_address;
        $address = $ship_to_different_address ? $request->shipping : $request->billing;
        if (count($availableMethods) && $address['country'] != 'US') {
            if (empty($request->courier_service_id)) {
                return back()->withErrors([
                    'courier_service_id' => 'Please select a shipping method.',
                ])->withInput();
            }
            $isShippingRequired = true;
        }
        $user = Auth::user();
        $cart = Cart::getContent();
        $subtotal = Cart::getSubTotal();
        $result = $this->orderService->validateCartStockQuantities($cart);
        if ($result instanceof RedirectResponse) {
            return $result;
        }

        if ($address['country'] !== 'US' && $address['country'] !== 'CA') {
            $this->orderService->checkMinOrderAmount($subtotal);
        }

        $this->couponService->refreshCouponAndValidate($subtotal);
        $billingAddress = $request->input('billing');
        $shippingAddress = $billingAddress;
        if ($request->ship_to_different_address) {
            $shippingAddress = $request->input('shipping');
        }
        if($shippingAddress['country'] == 'US'){
            $isShippingRequired = true; 
        }
        // Order basics
        $orderNumber = generateOrderNumber();
        $transactionId = 'TRX-' . uniqid();
        $couponId = Session::get('coupon_id', null);
        $discount = Session::get('coupon_amount', 0);
        $shippingCost = 0;
        if($isShippingRequired){
            $shippingCost = Session::get('shipping_cost');
        }
        $totalAmount = max($subtotal + $shippingCost - $discount, 0);
        $newsLetter = $request->newsletter_subscription;
        if ($newsLetter) {
            $email = $request->customer_email ?? $billingAddress['email'] ?? $shippingAddress['email'] ?? null;
            $this->orderService->newsletterSubscription($email);
        }
        // easy shipping
        $courier_service_id = null;
        $courier_name = null;
        $delivery_time = null;
        $total_courier_charge = 0;
        // easy shipping
        if($request->shipping_method_id == 1){
            $courier_service_id = $request->input('courier_service_id');
            $courier_name = $request->input('selected_courier_name');
            $delivery_time = $request->input('selected_delivery_time');
            $total_courier_charge = $request->input('selected_courier_total_charge');
        }
         // Create Order
         $orderData = [
            'order_number'      => $orderNumber,
            'user_id'           => $user?->id,
            'coupon_id'         => $couponId ?? null,
            'customer_name'     => $user?->name ?? '',
            'customer_email'    => $user?->email ?? null,
            'customer_phone'    => $user?->phone ?? null,
            'subtotal'          => $subtotal,
            'discount'          => $discount,
            'shipping_cost'     => $shippingCost,
            'es_ship_courier_service_id' => $courier_service_id ?? null,
            'es_ship_courier_name' => $courier_name ?? null,
            'es_ship_delivery_time' => $delivery_time ?? null,
            'es_ship_courier_total_charge' => $total_courier_charge,
            'billing_address'   => $billingAddress,
            'shipping_address'  => $shippingAddress,
            'total_amount'      => $totalAmount,
            'payment_method'    => $request->paymentMethod ?? 'cash',
            'transaction_id'    => $transactionId,
        ];
        $order = $this->orderService->orderGenerate($orderData, $cart);

        
        if($request->paymentMethod === 'stripe'){
            try {
                \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
                $charge = \Stripe\Charge::create([
                    'amount' =>  $totalAmount * 100, // amount in cents
                    'currency' => 'usd',
                    'source' => $request->stripeToken,
                    'description' => 'Integmeds Order Payment - ' . $order->order_number,
                ]);
                if ($charge->status === 'succeeded') {
                    $order->update([
                        'payment_status' => 'paid',
                        'order_status' => 'completed'
                    ]);
                    $this->processOrderDetailsAndStock($order, $order->items);
                    if (!empty($couponId) && ($coupon = Cupon::find($couponId))) {
                        $coupon->increment('used');
                    }
                    SendOrderInvoice::dispatch($order);

                    $easyship = $availableMethods->find(1);
                    $token = $easyship->token ?? null;  // fix typo 'toekn' => 'token'

                    if (!empty($token) && app()->environment('production')) {
                        CreateEasyshipShipment::dispatch($order, $token, $this->shippingService->createShippingParcels());
                    }

                    if(app()->environment('production')){
                        $this->shippingEasyOrder($order, $this->shippingService->getCartLineItems());
                    }

                    $this->orderService->sendOrderNotification($order);

                    Cart::clear();

                    $this->couponService->removeSessionCoupon();
                    if(Auth::check()){
                        return redirect()->route('user.order-invoice', ['id' => $order->id])->with('order_complete', 'Thanks! Your order has been placed successfully.');
                    }
                    return redirect()->route('order.complete', ['id' => $order->id])->with('order_complete', 'Thanks! Your order has been placed successfully.');
                } else {
                    throw ValidationException::withMessages([
                        'error' => "Payment failed. Please try again."
                    ]);
                }
            } catch (\Exception $e) {
                throw ValidationException::withMessages([
                    'error' => "Payment failed: " . $e->getError()->message
                ]);
            }
        }
        if($request->paymentMethod === 'sslcommerz'){
            $sslPostData = $this->orderService->sslCommerzPayload($totalAmount, $transactionId);
            $sslc = new SslCommerzNotification();
            try {
                $sslc->makePayment($sslPostData, 'hosted');
            } catch (\Exception $e) {
                throw ValidationException::withMessages([
                    'error' => "Payment failed: " . $e->getMessage()
                ]);
            }
        }
    }

    public function shippingEasyOrder($order, $lineItems)
    {
        $shipping_easy['api_key'] = config('shipping.shipping_easy_api_key');
        $shipping_easy['api_secret'] = config('shipping.shipping_easy_api_secret');
        $shipping_easy['store_api_key'] = config('shipping.shipping_easy_store_api_key');

        if (!empty($shipping_easy['api_key']) && !empty($shipping_easy['api_secret']) && !empty($shipping_easy['store_api_key'])) {
            CreateShippingEasyOrder::dispatch($order, $shipping_easy, $lineItems);
        }
    }

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $couponId = Session::get('coupon_id', null);

        $sslc = new SslCommerzNotification();

        $order = Order::where('transaction_id', $tran_id)->first();

        if (!$order) {
            return response('Invalid Transaction: Order not found', 404);
        }

        if ($order->order_status == 'pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation === true) {
                $order->update([
                    'payment_status' => 'paid',
                    'order_status' => 'completed'
                ]);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                $this->processOrderDetailsAndStock($order, $order->items);
                if (!empty($couponId) && ($coupon = Cupon::find($couponId))) {
                    $coupon->increment('used');
                }
               
                SendOrderInvoice::dispatch($order);
                // easy shipping
                $easyship = ShippingMethod::find(1);
                $token = $easyship->token;

                if (!empty($token) && app()->environment('production')) {
                    CreateEasyshipShipment::dispatch($order, $token, $this->shippingService->createShippingParcels());
                }

                if (app()->environment('production')) {
                    $this->shippingEasyOrder($order, $this->shippingService->getCartLineItems());
                }

                $this->orderService->sendOrderNotification($order);
                Cart::clear();
                // Use your CouponService method to clear session
                $this->couponService->removeSessionCoupon();
                if(Auth::check()){
                    return redirect()->route('user.order-invoice', ['id' => $order->id])->with('order_complete', 'Thanks! Your order has been placed successfully.');
                }
                return redirect()->route('order.complete', ['id' => $order->id])->with('order_complete', 'Thanks! Your order has been placed successfully.');
            } else {
                $order->update(['payment_status' => 'failed']);
                return response('Validation Failed', 400);
            }
        }

        return response('Invalid Transaction', 400);
    }
    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $order = Order::where('transaction_id', $tran_id)->first();
        if($order){
            $order->delete();
        }
        return to_route('order.status')->with('order_failed', 'The Order has been failed');
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $order = Order::where('transaction_id', $tran_id)->first();
        if($order){
            $order->delete();
        }
        return to_route('order.status')->with('order_cancelled', 'The Order has been cancelled');
    }

    public  function orderStatus(){
        return view('Web.Layout.pages.order.order-status');
    }

    public  function processOrderDetailsAndStock($order, $items){
        foreach ($items as $row) {

            Product::where('id', $row->product_id)->update([
                'quantity' => DB::raw("quantity - {$row->quantity}")
            ]);
            Inventory::where('product_id', $row->product_id)->update([
                'quantity' => DB::raw("quantity - {$row->quantity}")
            ]);
            StockLeadger::create([
                'product_id' => $row->product_id,
                'quantity' => $row->quantity,
                'type' => 'out',
                'note' => "Quantity decreased by customer purchase: - $row->quantity order id $order->id",
            ]);
        }
    }

    // public function ipn(Request $request)
    // {
    //     #Received all the payement information from the gateway
    //     if ($request->input('tran_id')) #Check transation id is posted or not.
    //     {
    //         $tran_id = $request->input('tran_id');
    //         #Check order status in order tabel against the transaction id or order id.
    //         $order_details = DB::table('orders')
    //             ->where('transaction_id', $tran_id)
    //             ->select('transaction_id', 'status', 'total')->first();
    //         if ($order_details->status == 0) {
    //             $sslc = new SslCommerzNotification();
    //             $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
    //             if ($validation == TRUE) {
    //                 /*
    //                 That means IPN worked. Here you need to update order status
    //                 in order table as Processing or Complete.
    //                 Here you can also sent sms or email for successful transaction to customer
    //                 */
    //                 $update_product = DB::table('orders')
    //                     ->where('transaction_id', $tran_id)
    //                     ->update(['order_status' => 1]);
    //                 echo "Transaction is successfully Completed";
    //             } else {
    //                 /*
    //                 That means IPN worked, but Transation validation failed.
    //                 Here you need to update order status as Failed in order table.
    //                 */
    //                 $update_product = DB::table('orders')
    //                     ->where('transaction_id', $tran_id)
    //                     ->update(['order_status' => 5]);
    //                 echo "validation Fail";
    //             }
    //         } else if ($order_details->status == 1 || $order_details->status == 3) {
    //             #That means Order status already updated. No need to udate database.
    //             echo "Transaction is already successfully Completed";
    //         } else {
    //             #That means something wrong happened. You can redirect customer to your product page.
    //             echo "Invalid Transaction";
    //         }
    //     } else {
    //         echo "Invalid Data";
    //     }
    // }

    public function orderComplete($id)
    {
        if (!Session::has('order_complete')) {
            return redirect('/');
        }
        $order = Order::findOrFail($id);
        return view('order-invoice')->with(
            [
                'success' => 'Thanks! Your order has been placed successfully.',
                'order' => $order,
            ]
        );
    }

    public function updateShippingCost(Request $request)
    {
        $request->validate([
            'shipping_cost' => 'required|numeric|max:999999',
        ]);
        Session::put('shipping_cost', $request->shipping_cost);
        return response()->json(['success' => true]);
    }
}

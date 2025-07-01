<?php

namespace App\Http\Controllers\Web;

use Cart;
use App\Models\Order;
use App\Jobs\SendOrderInvoice;
use Illuminate\Http\Request;
use App\Services\Web\OrderService;
use App\Services\Web\CouponService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrderPlaceRequest;
use App\Library\SslCommerz\SslCommerzNotification;

class OrderController extends Controller
{
    protected $orderService;
    protected $couponService;

    public function __construct(OrderService $orderService, CouponService $couponService)
    {
        $this->orderService = $orderService;
        $this->couponService = $couponService;
    }
    public  function placeOrder(OrderPlaceRequest $request)
    {
        $this->orderService->placeOrder($request);
    }


    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        $order = Order::where('transaction_id', $tran_id)->first();

        if (!$order) {
            return response('Invalid Transaction: Order not found', 404);
        }

        if ($order->order_status == 'pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation === true) {
                $order->update(['order_status' => 'pending']);
                Cart::clear();
                // Use your CouponService method to clear session
                $this->couponService->removeSessionCoupon();
                SendOrderInvoice::dispatch($order);
                if(Auth::check()){
                    return redirect()->route('user.order-invoice', ['id' => $order->id])->with('order_complete', 'Thanks! Your order has been placed successfully.');
                }
                return redirect()->route('order.complete', ['id' => $order->id])->with('order_complete', 'Thanks! Your order has been placed successfully.');
            } else {
                $order->update(['order_status' => 'failed']);
                return response('Validation Failed', 400);
            }
        }

        return response('Invalid Transaction', 400);
    }
    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        Order::where('transaction_id', $tran_id)
            ->update(['order_status' => 'failed']);

        return to_route('order.status')->with('order_failed', 'The Order has been failed');
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        Order::where('transaction_id', $tran_id)
            ->update(['order_status' => 'cancelled']);

        return to_route('order.status')->with('order_cancelled', 'The Order has been failed');
    }

    public  function orderStatus(){
        return view('Web.Layout.pages.order.order-status');
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
}

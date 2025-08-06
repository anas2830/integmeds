<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('user')->where('payment_status', 'paid');
        if ($request->filled('search')) {
            $orders->where('order_number', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('status')) {
            $orders->where('order_status', $request->status);
        }
        if ($request->filled('sort')) {
            if ($request->sort == 'oldest') {
                $orders->orderBy('id', 'asc');
            } else if ($request->sort == 'newest') {
                $orders->orderBy('id', 'desc');
            } else if ($request->sort == 'price_low_to_high') {
                $orders->orderBy('total_amount', 'asc');
            } else if ($request->sort == 'price_high_to_low') {
                $orders->orderBy('total_amount', 'desc');
            }
        }
        $orders = $orders->latest('id')->paginate(10);
        return view('Backend.admin.order.index', compact('orders', 'request'));
    }

    public function show($id)
    {
        $data['order'] = Order::with('items.product', 'user')->findOrFail($id);
        if (!$data['order']) {
            throw new \Exception('Order not found');
        }
        return view('order-invoice', $data);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = $request->order_status;
        $order->save();
        return redirect()->back()->with('success', 'Order status updated successfully');
    }
}

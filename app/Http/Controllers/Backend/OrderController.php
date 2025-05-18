<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Order;


class OrderController extends Controller
{
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return response()->json([
            'order' => $order,
            'items' => $order->items
        ]);
    }
}

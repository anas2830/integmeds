<?php

use App\Models\Order;

if (!function_exists('generateOrderNumber')) {
    function generateOrderNumber()
    {
        $date = date('Ymd');
        $countToday = Order::whereDate('created_at', now()->toDateString())->count();
        $number = str_pad($countToday + 1, 4, '0', STR_PAD_LEFT);
        return "ORD-{$date}{$number}";
    }
}

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


if (!function_exists('countries')) {
    function countries()
    {
        $json = file_get_contents('https://countriesnow.space/api/v0.1/countries/iso');

        if ($json === false) {
            return [];
        }
        $parsed = json_decode($json, true);
        return $parsed['data'];
    }
}

<?php

use App\Models\Order;
use App\Models\Country;

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
        return Country::all();
    }
}


function convertYoutubeToEmbed($url)
{
    $parsed = parse_url($url);

    if (isset($parsed['host'])) {
        if (in_array($parsed['host'], ['youtu.be'])) {
            // Short URL: https://youtu.be/VIDEO_ID
            $video_id = ltrim($parsed['path'], '/');
        } elseif (strpos($parsed['host'], 'youtube.com') !== false) {
            // Long URL: https://www.youtube.com/watch?v=VIDEO_ID
            parse_str($parsed['query'] ?? '', $query);
            $video_id = $query['v'] ?? null;
        } else {
            $video_id = null;
        }

        if ($video_id) {
            return "https://www.youtube.com/embed/" . $video_id;
        }
    }

    return null;
}


if (!function_exists('pendingOrderCount')) {
    function pendingOrderCount()
    {
        return Order::where('order_status', 'pending')->count();
    }
}

if (!function_exists('adminUser')) {
    function adminUser()
    {
        return Auth::guard('admin')->user();
    }
}
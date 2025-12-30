<?php

use App\Models\Order;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;

if (!function_exists('generateOrderNumber')) {
    function generateOrderNumber()
    {
        $prefix = "ORD-".date('ymd');
        $maxOrderNumber = Order::whereDate('created_at', now())->max('order_number');
        if ($maxOrderNumber) {
            $lastNumber = (int) substr($maxOrderNumber, -4);
            $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '0001';
        }
        return $prefix . $nextNumber;
    }
}


if (!function_exists('countries')) {
    function countries()
    {
        return Country::all();
    }
}



if (!function_exists('convertYoutubeToEmbed')) {
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
}

if (!function_exists('getCountryByIsoCode')) {
    function getCountryByIsoCode($code){
        return Country::where('iso2', $code)->value('name');
    }
}    

if (!function_exists('pendingPaidOrderCount')) {
    function pendingPaidOrderCount()
    {
        return Order::where('order_status', 'pending')->where('payment_status', 'paid')->count();
    }
}

if (!function_exists('adminUser')) {
    function adminUser()
    {
        return Auth::guard('admin')->user();
    }
}

if (!function_exists('purify')) {
    function purify($content)
    {
        return Purifier::clean($content);
    }
}
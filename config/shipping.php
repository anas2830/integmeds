<?php

return [

    'fixed_rates' => [
        'US' => env('FIXED_SHIPPING_RATE_US', 10),
        'CA' => env('FIXED_SHIPPING_RATE_CA', 40),
        'OTHER' => env('FIXED_SHIPPING_RATE_OTHER', 80),
    ],

    'shipping_easy_api_key' => env('SHIPPING_EASY_API_KEY'),
    'shipping_easy_api_secret' => env('SHIPPING_EASY_API_SECRET'),
    'shipping_easy_store_api_key' => env('SHIPPING_EASY_STORE_API_KEY'),


];

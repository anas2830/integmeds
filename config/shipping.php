<?php

return [
    'additional_rates' => [
        'US' => env('ADDITIONAL_SHIPPING_RATE_US', 10),
        'CA' => env('ADDITIONAL_SHIPPING_RATE_CA', 20),
        'OTHER' => env('ADDITIONAL_SHIPPING_RATE_OTHER', 80),
    ],
];

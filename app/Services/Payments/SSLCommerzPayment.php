<?php

namespace App\Services\Payments;

use App\Services\Payments\PaymentInterface;

class SslCommerzPayment implements PaymentInterface
{
    public function pay(array $orderData)
    {
        // Prepare $post_data with order info
        // Redirect to SSLCommerz gateway
    }

    public function handleCallback(array $requestData)
    {
        // Validate the payment
        // Update order status
    }
}
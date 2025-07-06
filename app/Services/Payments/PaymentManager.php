<?php

namespace App\Services\Payments;

class PaymentManager
{
    public static function make(string $method): PaymentInterface
    {
        return match ($method) {
            'sslcommerz' => new SslCommerzPayment(),
            default => throw new \Exception("Unsupported payment method: $method")
        };
    }
}

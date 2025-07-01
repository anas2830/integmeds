<?php

namespace App\Services\Payments;

interface PaymentInterface
{
    public function pay(array $orderData);
    public function handleCallback(array $requestData);
}
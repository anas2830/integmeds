<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;

class CreateShippingEasyOrder implements ShouldQueue
{
    use Queueable;

    protected $shipping_easy;
    protected $order;
    protected $parcels;

    /**
     * Create a new job instance.
     */
    public function __construct($order, $shipping_easy, $parcels)
    {
        $this->shipping_easy = $shipping_easy;
        $this->order = $order;
        $this->parcels = $parcels;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        require_once(base_path('app/Library/shipping_easy-php/lib/ShippingEasy.php'));

        // Set API credentials
        \ShippingEasy::setApiKey($this->shipping_easy['api_key']);
        \ShippingEasy::setApiSecret($this->shipping_easy['api_secret']);

        // Validate and build line items
        $lineItems = is_array($this->parcels) ? $this->parcels : [$this->parcels];

        // Create order payload
        $orderPayload = [
            "external_order_identifier"   => $this->order->order_number,
            "ordered_at"                  => $this->order->created_at->toIso8601String(),
            "custom_1"                    => "{$this->order->es_ship_courier_name} | {$this->order->es_ship_delivery_time}",
            "custom_2"                    => $this->order->es_ship_courier_name,
            "custom_3"                    => $this->order->es_ship_delivery_time,
            "base_shipping_cost"          => $this->order->shipping_cost,
            "shipping_cost_including_tax" => $this->order->shipping_cost,
            "shipping_cost_excluding_tax" => $this->order->shipping_cost,
            "shipping_cost_tax"           => "0.00",
            "subtotal_including_tax"      => $this->order->subtotal,
            "subtotal_excluding_tax"      => $this->order->subtotal,
            "subtotal_tax"                => "0.00",
            "total_including_tax"         => $this->order->subtotal + $this->order->shipping_cost,
            "total_excluding_tax"         => $this->order->subtotal + $this->order->shipping_cost,
            "total_tax"                   => "0.00",
            "discount_amount"             => "0.00",
            "coupon_discount"             => "0.00",
            "recipients" => [
                [
                    "first_name"       => $this->order->shipping_address['first_name'] ?? '',
                    "last_name"        => $this->order->shipping_address['last_name'] ?? '',
                    "email"            => $this->order->shipping_address['email'] ?? '',
                    "phone_number"     => $this->order->shipping_address['phone'] ?? '',
                    "address"          => $this->order->shipping_address['address_line1'] ?? '',
                    "address2"         => $this->order->shipping_address['address_line2'] ?? '',
                    "state"            => $this->order->shipping_address['state'] ?? '',
                    "city"             => $this->order->shipping_address['city'] ?? '',
                    "postal_code"      => $this->order->shipping_address['postal_code'] ?? '', // ✅ fixed
                    "country"          => $this->order->shipping_address['country'] ?? '',
                    "shipping_method"  => "Ground",
                    "items_total"    => is_array($this->parcels) ? count($this->parcels) : 1,
                    "line_items"       => $lineItems,
                ]
            ]
        ];

        // Create the order
        $order = new \ShippingEasy_Order($this->shipping_easy['store_api_key'], $orderPayload);

        try {
            $response = $order->create();
        } catch (\Exception $e) {
            // Handle error
            Log::error('ShippingEasy Order Error', ['message' => $e->getMessage()]);
            throw $e;
        }
    }
}

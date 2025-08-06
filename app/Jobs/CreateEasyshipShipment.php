<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateEasyshipShipment implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected string $token;
    protected $order;
    protected $parcels;

    public function __construct($order, string $token, $parcels)
    {
        $this->token = $token;
        $this->order = $order;
        $this->parcels = $parcels;
    }

    public function handle(): void
    {
        $payload = [
            "origin_address" => [
                "line_1" => "12727 Featherwood Dr #104",
                "line_2" => "",
                "state" => "TX",
                "city" => "Houston",
                "postal_code" => "77034",
                "country_alpha2" => "US",
                "contact_name" => "integmeds",
                "company_name" => "integmeds",
                "contact_phone" => "+13463460732",
                "contact_email" => "contact@integmeds.com"
            ],
            "destination_address" => [
                "line_1" => $this->order->shipping_address['address_line1'] ?? '',
                "line_2" => $this->order->shipping_address['address_line2'] ?? '',
                "state" => $this->order->shipping_address['state'] ?? '',
                "city" => $this->order->shipping_address['city'] ?? '',
                "postal_code" => $this->order->shipping_address['postal_code'] ?? '',
                "country_alpha2" => $this->order->shipping_address['country'] ?? '',
                "contact_name" => trim(($this->order->shipping_address['first_name'] ?? '') . ' ' . ($this->order->shipping_address['last_name'] ?? '')),
                "contact_phone" => $this->order->shipping_address['phone'] ?? '',
                "contact_email" => $this->order->shipping_address['email'] ?? '',
            ],
            "courier_settings" => [
                "courier_service_id" => $this->order->es_ship_courier_service_id,
                "allow_fallback" => true,
                "apply_shipping_rules" => true
            ],
            "shipping_settings" => [
                "buy_label" => true,
                "buy_label_synchronous" => true,
                "printing_options" => [
                    "format" => "png",
                    "label" => "4x6",
                    "commercial_invoice" => "A4",
                    "packing_slip" => "4x6"
                ]
            ],
            "parcels" => $this->parcels,
            "order_data" => [
                "buyer_selected_courier_name" => $this->order->es_ship_courier_name,
                "platform_name" => "integmeds",
                "platform_order_number" => $this->order->order_number,
                "order_created_at" => $this->order->created_at->toIso8601String(),
            ],
        ];

        $response = Http::withToken($this->token)
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->post('https://public-api.easyship.com/2024-09/shipments', $payload);
    }
}

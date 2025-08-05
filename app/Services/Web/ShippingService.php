<?php

namespace App\Services\Web;


use Cart;
use GuzzleHttp\Client;
use App\Models\ShippingMethod;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class ShippingService
{

    public function getShippingRates($data)
    {
        $countryCodes = [
            'CA', // Canada
            'GB', // United Kingdom
            'IE', // Ireland
            'NL', // Netherlands
            'MT', // Malta
            'JE', // Jersey
            'GG', // Guernsey
            'IM', // Isle of Man
            'GI', // Gibraltar
            'BM', // Bermuda
            'FO', // Faroe Islands
            'GL', // Greenland
            'LI', // Liechtenstein
        ];
        // Verify postal code and country via external API
        $useShippingAddress = $data['ship_to_different_address'];

        $address = $useShippingAddress ? ($data['shipping'] ?? []) : ($data['billing'] ?? []);
        if(in_array($address['country'], $countryCodes)){
            // $this->verifyAddressWithZipCodeBase($address['country'], $address['postal_code']);
            $this->verifyAddressWithGeoCode($address['country'], $address['postal_code']);
        }else{
            $this->verifyAddressWithZippopotam($address['country'], $address['postal_code']);
        }
        // Find active shipping method by ID
        $method = ShippingMethod::where('id', $data['shipping_method_id'] ?? null)
            ->where('status', 1)
            ->first();

        if (!$method) {
            throw ValidationException::withMessages([
                'shipping_method_id' => 'Shipping method not found or inactive.',
            ]);
        }

        // Prepare parcels data from cart
        $parcels = $this->prepareParcels();
        // Build request payload for shipping API
        $payload = $this->buildPayloadWithParcels($address, $parcels);

        
        // Send HTTP POST request to external shipping API
        $rateResponse = Http::withToken($method->token)
        ->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])
        ->post($method->api_url, $payload);

        $responseData = json_decode($rateResponse->getBody(), true);
 
                    
        if ($rateResponse->failed()) {
            throw ValidationException::withMessages([
                'shipping_method_id' => 'Could not fetch shipping rates from provider.',
            ]);
        }
        return $responseData;
    }

    private function verifyAddressWithGeoCode($country, $postalCode)
    {
        $postalCode = str_replace(' ', '', $postalCode);
        $url = "https://geocode.xyz/{$postalCode}?region={$country}&geoit=json";

        $response = Http::timeout(15)->get($url);
        $data = $response->json();

        if (isset($data['error'])) {
            throw ValidationException::withMessages([
                'shipping_method_id' => 'Shipping address is invalid.',
            ]);
        }
    }
    private function verifyAddressWithZippopotam($country, $postalCode)
    {
        $url = "http://api.zippopotam.us/{$country}/{$postalCode}";
        $response = Http::get($url);

        if ($response->failed() || empty($response->json())) {
            throw ValidationException::withMessages([
                'shipping_method_id' => 'Shipping address is invalid.',
            ]);
        }
    }

    public function verifyAddressWithZipCodeBase(string $country, string $postalCode)
    {
        $sanitizedPostalCode = str_replace(' ', '', $postalCode);

        $response = Http::get("https://app.zipcodebase.com/api/v1/search", [
            'apikey' => config('app.zipcodebase.api_key'),
            'codes' => $sanitizedPostalCode,
            'country' => $country,
        ]);

        if (!$response->ok()) {
            throw ValidationException::withMessages([
                'shipping_method_id' => 'Shipping address is invalid.',
            ]);
        }

        $data = $response->json();

        if (
            !isset($data['results'][$sanitizedPostalCode]) ||
            empty($data['results'][$sanitizedPostalCode])
        ) {
            throw ValidationException::withMessages([
                'shipping_method_id' => 'Shipping address is invalid.',
            ]);
        }

    }

    public function createShippingParcels(): array
    {
        $cartItems = Cart::getContent();

        $items = [];
        $totalWeight = 0;

        foreach ($cartItems as $item) {
            $attr = $item->attributes;
            $quantity = (int) $item->quantity;
            $weight = max((float) ($attr->weight ?? 0.1), 0.1);

            $items[] = [
                "quantity" => $quantity,
                "description" => $item->name,
                "category" => $attr->category,
                "sku" => $attr->sku,
                "actual_weight" => $weight,
                "dimensions" => [
                    "length" => (float) $attr->length,
                    "width"  => (float) $attr->width,
                    "height" => (float) $attr->height,
                ],
                "declared_currency" => "USD",
                "declared_customs_value" => $item->price,
                "origin_country_alpha2" => $attr->origin_country_alpha2 ?? 'US',
                "hs_code" => $attr->hs_code ?? '490199',
            ];

            $totalWeight += $weight * $quantity;
        }

        return [
            [
                "total_actual_weight" => round($totalWeight, 2),
                "items" => $items
            ]
        ];
    }

    private function prepareParcels(): array
    {
        $cartItems = Cart::getContent();

        $items = [];
        $totalWeight = 0;

        foreach ($cartItems as $item) {
            $attr = $item->attributes;
            $quantity = (int) $item->quantity;
            $weight = max((float) ($attr->weight ?? 0.1), 0.1); // fallback to 0.1kg

            $items[] = [
                "quantity" => $quantity,
                "category" => "mobiles",
                "declared_currency" => "USD",
                "declared_customs_value" => 100,
                "dimensions" => [
                    'length' => (float) ($attr->length ?? 1),
                    'width'  => (float) ($attr->width ?? 1),
                    'height' => (float) ($attr->height ?? 1),
                ],
                "actual_weight" => $weight,
                "hs_code" => $attr->hs_code ?? '85171200'
            ];

            $totalWeight += $weight * $quantity;
        }

        return [
            [
                'items' => $items,
                'total_actual_weight' => round($totalWeight, 2)
            ]
        ];
    }


    private function buildPayloadWithParcels(array $address, array $parcels): array
    {
        return [
            'origin_address' => [
                "address_line_1"=> "12727 Featherwood Dr #104",
                'country_alpha2' => 'US',
                'postal_code' => '77034',
                'city' => 'Houston',
                'state' => 'TX'
            ],
            'destination_address' => [
                'country_alpha2' => $address['country'],
                'postal_code' => $address['postal_code'],
                'city' => $address['city'],
                'state' => $address['state'],
            ],
            'parcels' => $parcels, // ✅ use prepared dynamic parcels
        ];
    }

    public function generateShippingCharge(array $rates, string $selectedCourierId): float
    {
        foreach ($rates as $rate) {
            $courierId = $rate['courier_service']['id'] ?? null;
            $charge = $rate['total_charge'] ?? 0;

            if ($courierId === $selectedCourierId) {
                return (float) $charge;
            }
        }

        return 0;
    }
}
    

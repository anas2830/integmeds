<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $shipToDifferent = $this->input('ship_to_different_address');
        return [
            'shipping_method_id' => $this->expectsJson()
                ? 'required|exists:shipping_methods,id'
                : 'nullable|exists:shipping_methods,id',

            'billing.country' => $shipToDifferent ? 'nullable|string' : 'required|string',
            'billing.postal_code' => $shipToDifferent ? 'nullable|string' : 'required|string',
            'billing.city' => $shipToDifferent ? 'nullable|string' : 'required|string',
            'billing.state' => $shipToDifferent ? 'nullable|string' : 'required|string',

            'shipping.country' => $shipToDifferent ? 'required|string' : 'nullable|string',
            'shipping.postal_code' => $shipToDifferent ? 'required|string' : 'nullable|string',
            'shipping.city' => $shipToDifferent ? 'required|string' : 'nullable|string',
            'shipping.state' => $shipToDifferent ? 'required|string' : 'nullable|string',
        ];
    }
}

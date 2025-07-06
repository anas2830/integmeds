<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderPlaceRequest extends FormRequest
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

        $rules = [
            'newsletter_subscription' => ['nullable', 'boolean'],
            'agree_terms'  => ['accepted'],
            'paymentMethod' => ['required', 'string'],
            'courier_service_id' => ['nullable', 'string'],            

            // Billing rules (always required)
            'billing.first_name'      => ['required', 'string', 'max:100'],
            'billing.last_name'       => ['required', 'string', 'max:100'],
            'billing.email'           => ['required', 'email', 'max:100'],
            'billing.phone'           => ['required', 'string', 'max:20'],
            'billing.country'         => ['required', 'string', 'max:100'],
            'billing.address_line1'   => ['required', 'string', 'max:1000'],
            'billing.address_line2'   => ['nullable', 'string', 'max:200'],
            'billing.city'            => ['required', 'string', 'max:100'],
            'billing.state'           => ['required', 'string', 'max:100'],
            'billing.postal_code'     => ['required', 'string', 'max:10'],
        ];

        // Only apply shipping validation if "ship to different address" is checked
        if ($this->input('ship_to_different_address')) {
            $rules = array_merge($rules, [
                'shipping.first_name'      => ['required', 'string', 'max:100'],
                'shipping.last_name'       => ['required', 'string', 'max:100'],
                'shipping.email'           => ['required', 'email', 'max:100'],
                'shipping.phone'           => ['required', 'string', 'max:20'],
                'shipping.country'         => ['required', 'string', 'max:100'],
                'shipping.address_line1'   => ['required', 'string', 'max:1000'],
                'shipping.address_line2'   => ['nullable', 'string', 'max:200'],
                'shipping.city'            => ['required', 'string', 'max:100'],
                'shipping.state'           => ['required', 'string', 'max:100'],
                'shipping.postal_code'     => ['required', 'string', 'max:10'],
            ]);
        }

        return $rules;
    }
}

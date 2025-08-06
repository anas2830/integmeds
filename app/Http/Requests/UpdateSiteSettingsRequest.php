<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to false if you want to implement auth checks
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'site_name' => 'nullable|string|max:100',
            'site_email' => 'nullable|email|max:100',
            'site_phone' => 'nullable|string|max:20',
            'site_description' => 'nullable|string|max:1000',
            'address' => 'nullable|string|max:200',
            'copyright_text' => 'nullable|string|max:100',
            'currency' => 'nullable|string|max:20',
            'minimum_order' => 'nullable|string',
        ];
    }
}
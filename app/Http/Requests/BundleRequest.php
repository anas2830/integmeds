<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BundleRequest extends FormRequest
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
        $bundleId = $this->route('id');
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('bundles', 'name')->ignore($bundleId),
            ],
            'description' => ['nullable', 'string', 'max:60000'],
            'status' => ['required', 'boolean'],
            'bundle_products' => ['required', 'array'],
            'bundle_products.*' => ['exists:products,id'],
            'bundle_icon' => ['nullable', 'max:2048'],
            'bundle_images' => ['nullable'],
        ];
    }
}

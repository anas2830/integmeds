<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        // Try to get the product ID from the route (null if creating)
        $productId = $this->route('id') ?? $this->route('product');

        return [
            'product_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'product_name')
                    ->ignore($productId)
                    ->whereNull('deleted_at'),
            ],
            'sku' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'sku')->ignore($productId)->whereNull('deleted_at'),
            ],
            'ups_code' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('products', 'ups_code')->ignore($productId)->whereNull('deleted_at'),
            ],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:product_categories,id'],
            'brand_id' => ['nullable', 'exists:product_brands,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:product_tags,id'],
            'sizes' => ['nullable', 'array'],
            'sizes.*' => ['exists:product_sizes,id'],
            'description' => ['nullable', 'string'],
            'research' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string', 'max:50000'],
            'video_url' => ['nullable', 'array'],
            'video_url.*' => ['nullable', 'url', 'max:255'],
            'video_en' => ['nullable', 'url'],
            'video_bn' => ['nullable', 'url'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:500'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'product_images' => ['nullable'],
            // 'product_images.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:10240'],
            'purchase_price' => ['nullable', 'numeric', 'min:0'],
            'regular_price' => ['nullable', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0'],
            'weight'        => ['required', 'numeric', 'min:0'],
            'length'        => ['required', 'numeric', 'min:0', 'max:10'],
            'width'         => ['required', 'numeric', 'min:0', 'max:10'],
            'height'        => ['required', 'numeric', 'min:0', 'max:5'],
            'status'        => ['required', 'string', 'max:255'],
        ];
    }
}

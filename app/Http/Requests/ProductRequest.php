<?php

namespace App\Http\Requests;

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
        // dd(request()->all());
        return [
            'product_name'       => 'required|string|max:255|unique:products,product_name',
            'sku'               => 'required|string|max:255|unique:products,sku',
            'categories'      => 'required|array',
            'categories.*'    => 'exists:product_categories,id',
            'brand_id'          => 'nullable|exists:product_brands,id',
            'tags'           => 'nullable|array',
            'tags.*'         => 'exists:product_tags,id',
            'sizes'          => 'nullable|array',
            'sizes.*'        => 'exists:product_sizes,id',
            'description'       => 'nullable|string',
            'short_description' => 'nullable|string|max:50000',
            'video_en'   => 'nullable|url',
            'video_bn'   => 'nullable|url',
            'stock_quantity'    => 'required|integer|min:0',
            'meta_title'        => 'nullable|string|max:255',
            'meta_keywords'     => 'nullable|string|max:500',
            'meta_description'  => 'nullable|string|max:1000',
            'product_images'      => 'nullable',
            // 'product_images.*'    => 'image|mimes:jpeg,png,jpg,webp|max:10240',
            'purchase_price'    => 'nullable|numeric|min:0',
            'regular_price'     => 'nullable|numeric|min:0|lte:sale_price',
            'sale_price'        => 'nullable|numeric|min:0',
        ];
    }
}

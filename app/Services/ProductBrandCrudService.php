<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\ProductBrand;

class ProductBrandCrudService
{

    public function getProductBrandList($request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'sort_by' => 'nullable|string',
            'sort_direction' => 'nullable|string|in:asc,desc',
        ]);
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['productBrands'] = ProductBrand::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
        return $data;
    }

    public function createProductBrand($request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255|unique:product_brands,name',
            'status' => 'required|integer',
        ]);

        $productBrand = new ProductBrand();
        $productBrand->name = $request->brand_name;
        $productBrand->slug = Str::slug($request->brand_name);
        $productBrand->status = $request->status ?? 0;
        $productBrand->save();
    }

    public function editProductBrand($id)
    {
        $data['productBrand'] = ProductBrand::find($id);
        return $data;
    }

    public function updateProductBrand($request, $id)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255|unique:product_brands,name,' . $id,
            'status' => 'required|integer',
        ]);

        $productBrand = ProductBrand::find($id);
        $productBrand->name = $request->brand_name;
        $productBrand->slug = Str::slug($request->brand_name);
        $productBrand->status = $request->status ?? 0;
        $productBrand->save();
    }

    public function deleteProductBrand($id)
    {
        $productBrand = ProductBrand::find($id);
        $productBrand->delete();
    }

    public function statusUpdate($id)
    {
        $productBrand = ProductBrand::find($id);
        $productBrand->status = !$productBrand->status;
        $productBrand->save();
    }
}

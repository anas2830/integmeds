<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\ProductSize;

class ProductSizeCrudService
{

    public function getProductSizeList($request)
    {
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['productSizes'] = ProductSize::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
        return $data;
    }

    public function createProductSize($request)
    {
        $validated = request()->validate([
            'size_name' => 'required|string|max:255|unique:product_sizes,name',
            'status'    => 'nullable|integer',
        ]);

        $productSize = new ProductSize();
        $productSize->name = $request->size_name;
        $productSize->slug = Str::slug($request->size_name);
        $productSize->status = $request->status ?? 0;
        $productSize->save();
    }

    public function editProductSize($id)
    {
        $data['productSize'] = ProductSize::find($id);
        return $data;
    }

    public function updateProductSize($request, $id)
    {
        $validated = request()->validate([
            'size_name' => 'required|string|max:255|unique:product_sizes,name,' . $id,
            'status'    => 'nullable|integer',
        ]);
        $productSize = ProductSize::find($id);
        $productSize->name = $request->size_name;
        $productSize->slug = Str::slug($request->size_name);
        $productSize->status = $request->status ?? 0;
        $productSize->save();
    }

    public function deleteProductSize($id)
    {
        $productSize = ProductSize::find($id);
        $productSize->delete();
    }

    public function statusUpdate($id)
    {
        $productSize = ProductSize::find($id);
        $productSize->status = !$productSize->status;
        $productSize->save();
    }
    
}

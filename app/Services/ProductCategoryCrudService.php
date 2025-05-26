<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\ProductCategory;

class ProductCategoryCrudService
{
    public function getProductCategoryList($request)
    {
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['productCategories'] = ProductCategory::with('parent')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
        return $data;
    }

    public function getParentCategories()
    {
        return ProductCategory::valid()->whereNull('parent_id')->get(['id', 'name']);
    }

    public function createProductCategory($request)
    {
        $productCategory = new ProductCategory();
        $productCategory->name = $request->category_name;
        $productCategory->slug = Str::slug($request->category_name);
        $productCategory->parent_id = $request->parent_category_id;
        $productCategory->description = $request->description;
        $productCategory->status = $request->status ?? 0;
        $productCategory->save();
        return $productCategory;
    }

    public function editProductCategory($id)
    {
        $data['parent_categories'] = $this->getParentCategories();
        $data['productCategory'] = ProductCategory::find($id);
        return $data;
    }

    public function updateProductCategory($request, $id)
    {
        $productCategory = ProductCategory::find($id);
        $productCategory->name = $request->category_name;
        $productCategory->slug = Str::slug($request->category_name);
        $productCategory->parent_id = $request->parent_category_id;
        $productCategory->description = $request->description;
        $productCategory->status = $request->status ?? 0;
        $productCategory->save();
        return $productCategory;
    }

    public function deleteProductCategory($id)
    {
        $productCategory = ProductCategory::find($id);
        $productCategory->delete();
    }

    public function statusUpdate($id)
    {
        $productCategory = ProductCategory::find($id);
        $productCategory->status = !$productCategory->status;
        $productCategory->save();
    }
}

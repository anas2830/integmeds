<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\ProductTag;

class ProductTagCrudService
{
    public function getProductTagList($request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'sort_by' => 'nullable|string',
            'sort_direction' => 'nullable|string|in:asc,desc',
        ]);
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['productTags'] = ProductTag::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
        return $data;
    }

    public function createProductTag($request)
    {
        $validated = request()->validate([
            'tag_name' => 'required|string|max:255|unique:product_tags,name',
            'status'   => 'nullable|integer',
        ]);
        $productTag = new ProductTag();
        $productTag->name = $request->tag_name;
        $productTag->slug = Str::slug($request->tag_name);
        $productTag->status = $request->status ?? 0;
        $productTag->save();
    }

    public function editProductTag($id)
    {
        $data['productTag'] = ProductTag::find($id);
        return $data;
    }

    public function updateProductTag($request, $id)
    {
        $validated = request()->validate([
            'tag_name' => 'required|string|max:255|unique:product_tags,name,' . $id,
            'status'   => 'nullable|integer',
        ]);
        $productTag = ProductTag::find($id);
        $productTag->name = $request->tag_name;
        $productTag->slug = Str::slug($request->tag_name);
        $productTag->status = $request->status ?? 0;
        $productTag->save();
    }

    public function deleteProductTag($id)
    {
        $productTag = ProductTag::find($id);
        $productTag->delete();
    }

    public function statusUpdate($id)
    {
        $productTag = ProductTag::find($id);
        $productTag->status = !$productTag->status;
        $productTag->save();
    }
}

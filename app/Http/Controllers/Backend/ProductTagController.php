<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductTagCrudService;

class ProductTagController extends Controller
{
    protected $productTagCrudService;

    public function __construct(ProductTagCrudService $productTagCrudService)
    {
        $this->productTagCrudService = $productTagCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->productTagCrudService->getProductTagList($request);
        return view('Backend.admin.product-tag.list', $data);
    }

    public function create()
    {
        return view('Backend.admin.product-tag.create');
    }

    public function store(Request $request)
    {
        $this->productTagCrudService->createProductTag($request);
        return redirect()->route('product-tag.index')->with('success', 'Product tag created successfully');
    }

    public function edit($id)
    {
        $data = $this->productTagCrudService->editProductTag($id);
        return view('Backend.admin.product-tag.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->productTagCrudService->updateProductTag($request, $id);
        return redirect()->route('product-tag.index')->with('success', 'Product tag updated successfully');
    }

    public function destroy($id)
    {
        $this->productTagCrudService->deleteProductTag($id);
        session()->flash('success', 'Product tag deleted successfully');
    }

    public function status($id)
    {
        $this->productTagCrudService->statusUpdate($id);
        session()->flash('success', 'Product tag status updated successfully');
    }
}

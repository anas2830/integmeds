<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductCategoryCrudService;

class ProductCategoryController extends Controller
{
    protected $productCategoryCrudService;

    public function __construct(ProductCategoryCrudService $productCategoryCrudService)
    {
        $this->productCategoryCrudService = $productCategoryCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->productCategoryCrudService->getProductCategoryList($request);
        return view('Backend.admin.product-category.list', $data);
    }

    public function create()
    {
        $data['parent_categories'] = $this->productCategoryCrudService->getParentCategories();
        return view('Backend.admin.product-category.create', $data);
    }

    public function store(Request $request)
    {
        $this->productCategoryCrudService->createProductCategory($request);
        return redirect()->route('product-category.index')->with('success', 'Product category created successfully');
    }

    public function edit($id)
    {
        $data = $this->productCategoryCrudService->editProductCategory($id);
        return view('Backend.admin.product-category.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->productCategoryCrudService->updateProductCategory($request, $id);
        return redirect()->route('product-category.index')->with('success', 'Product category updated successfully');
    }

    public function destroy($id)
    {
        $this->productCategoryCrudService->deleteProductCategory($id);
        session()->flash('success', 'Product category deleted successfully');
    }

    public function status($id)
    {
        $this->productCategoryCrudService->statusUpdate($id);
        session()->flash('success', 'Product category status updated successfully');
    }
}

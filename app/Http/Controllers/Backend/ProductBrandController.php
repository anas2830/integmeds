<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\ProductBrandCrudService;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    protected $productBrandCrudService;

    public function __construct(ProductBrandCrudService $productBrandCrudService)
    {
        $this->productBrandCrudService = $productBrandCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->productBrandCrudService->getProductBrandList($request);
        return view('Backend.admin.product-brand.list', $data);
    }

    public function create()
    {
        return view('Backend.admin.product-brand.create');
    }

    public function store(Request $request)
    {
        $this->productBrandCrudService->createProductBrand($request);
        return redirect()->route('product-brand.index')->with('success', 'Product brand created successfully');
    }

    public function edit($id)
    {
        $data = $this->productBrandCrudService->editProductBrand($id);
        return view('Backend.admin.product-brand.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->productBrandCrudService->updateProductBrand($request, $id);
        return redirect()->route('product-brand.index')->with('success', 'Product brand updated successfully');
    }

    public function destroy($id)
    {
        $this->productBrandCrudService->deleteProductBrand($id);
        session()->flash('success', 'Product brand deleted successfully');
    }

    public function status($id)
    {
        $this->productBrandCrudService->statusUpdate($id);
        session()->flash('success', 'Product brand status updated successfully');
    }
}

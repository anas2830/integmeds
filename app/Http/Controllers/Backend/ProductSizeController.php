<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductSizeCrudService;

class ProductSizeController extends Controller
{
    protected $productSizeCrudService;

    public function __construct(ProductSizeCrudService $productSizeCrudService)
    {
        $this->productSizeCrudService = $productSizeCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->productSizeCrudService->getProductSizeList($request);
        return view('Backend.admin.product-size.list', $data);
    }

    public function create()
    {
        return view('Backend.admin.product-size.create');
    }

    public function store(Request $request)
    {
        $this->productSizeCrudService->createProductSize($request);
        return redirect()->route('product-size.index')->with('success', 'Product size created successfully');
    }

    public function edit($id)
    {
        $data = $this->productSizeCrudService->editProductSize($id);
        return view('Backend.admin.product-size.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->productSizeCrudService->updateProductSize($request, $id);
        return redirect()->route('product-size.index')->with('success', 'Product size updated successfully');
    }

    public function destroy($id)
    {
        $this->productSizeCrudService->deleteProductSize($id);
        session()->flash('success', 'Product size deleted successfully');
    }

    public function status($id)
    {
        $this->productSizeCrudService->statusUpdate($id);
        session()->flash('success', 'Product size status updated successfully');
    }
}

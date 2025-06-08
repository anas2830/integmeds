<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\BundleRequest;
use App\Services\ProductBundleCrudService;

class ProductBundleController extends Controller
{
    protected $productBundleCrudService;

    public function __construct(ProductBundleCrudService $productBundleCrudService)
    {
        $this->productBundleCrudService = $productBundleCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->productBundleCrudService->getProductBundleList($request);
        return view('Backend.admin.product-bundle.list', $data);
    }

    public function create()
    {
        $data['existingFilesArray'] = [];
        $data['products'] = $this->productBundleCrudService->getProductList();
        return view('Backend.admin.product-bundle.create', $data);
    }

    public function store(BundleRequest $request)
    {
        $this->productBundleCrudService->createProductBundle($request);
        return redirect()->route('product-bundle.index')->with('success', 'Product bundle created successfully');
    }

    public function edit($id)
    {
        // dd($id);
        $data = $this->productBundleCrudService->editProductBundle($id);
        return view('Backend.admin.product-bundle.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->productBundleCrudService->updateProductBundle($request, $id);
        return redirect()->route('product-bundle.index')->with('success', 'Product bundle updated successfully');
    }

    public function destroy($id)
    {
        $this->productBundleCrudService->deleteProductCategory($id);
        session()->flash('success', 'Product bundle deleted successfully');
    }

    public function status($id)
    {
        $this->productBundleCrudService->statusUpdate($id);
        session()->flash('success', 'Product bundle status updated successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductCrudService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    protected $productCrudService;

    public function __construct(ProductCrudService $productCrudService)
    {
        $this->productCrudService = $productCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->productCrudService->getProductList($request);
        return view('Backend.admin.product.list', $data);
    }
    

    public function store(ProductRequest $request)
    {
        $this->productCrudService->createProduct($request->validated());
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }


    public function create()
    {
        $data = $this->productCrudService->getCreateProductData();
        $data['existingFilesArray'] = [];
        return view('Backend.admin.product.create', $data);
    }
    public function status($id)
    {
        $this->productCrudService->statusUpdate($id);
        session()->flash('success', 'Product status updated successfully');
    }

    public function destroy($id)
    {
        $this->productCrudService->deleteProduct($id);
        session()->flash('success', 'Product deleted successfully');
    }
}

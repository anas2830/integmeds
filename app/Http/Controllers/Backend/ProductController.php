<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductCrudService;

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
        return view('Backend.Product.list', $data);
    }
}

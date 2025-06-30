<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Services\ProductReviewService;

class ProductReviewController extends Controller
{
    protected ProductReviewService $reviewService;

    public function __construct(ProductReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $reviews = $this->reviewService->getAllReviewsPaginated();
        return view('Backend.admin.product-review.list', compact('reviews'));
    }

    public function create()
    {
        $data['users'] = User::valid()->get();
        $data['products'] = Cache::rememberForever('Product', function () {
            return Product::valid()->get();
        });
        return view('Backend.admin.product-review.create', $data);
    }

    public function store(Request $request)
    {
        $this->reviewService->create($request->all());
        return redirect()->route('product-review.index')->with('success', 'Review created successfully.');
    }

    public function edit($id)
    {
        $data['users'] = User::valid()->get();
        $data['products'] = Cache::rememberForever('Product', function () {
            return Product::valid()->get();
        });
        $data['review'] = $this->reviewService->getReviewById($id);
        return view('Backend.admin.product-review.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->reviewService->update($request->all(), $id);
        return redirect()->route('product-review.index')->with('success', 'Review updated successfully.');
    }

    public function approve($id)
    {
        $this->reviewService->approve($id);
        return back()->with('success', 'Review approved successfully.');
    }

    public function destroy($id)
    {
        $this->reviewService->delete($id);
        return back()->with('success', 'Review deleted successfully.');
    }
}

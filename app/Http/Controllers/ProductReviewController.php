<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
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

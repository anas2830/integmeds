<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\BundleReviewService;

class BundleReviewController extends Controller
{
    protected BundleReviewService $bundleReviewService;

    public function __construct(BundleReviewService $bundleReviewService)
    {
        $this->bundleReviewService = $bundleReviewService;
    }

    public function index()
    {
        $reviews = $this->bundleReviewService->getAllReviewsPaginated();
        return view('Backend.admin.bundle-review.list', compact('reviews'));
    }

    public function approve($id)
    {
        $this->bundleReviewService->approve($id);
        return back()->with('success', 'Review approved successfully.');
    }

    public function destroy($id)
    {
        $this->bundleReviewService->delete($id);
        return back()->with('success', 'Review deleted successfully.');
    }
}

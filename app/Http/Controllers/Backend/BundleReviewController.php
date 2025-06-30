<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Bundle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BundleReviewService;
use Illuminate\Support\Facades\Cache;

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

    public function create()
    {
        $data['users'] = User::valid()->get();
        $data['bundles'] = Cache::rememberForever('Bundle', function () {
            return Bundle::valid()->get();
        });
        return view('Backend.admin.bundle-review.create', $data);
    }

    public function store(Request $request)
    {
        $this->bundleReviewService->create($request->all());
        return redirect()->route('bundle-review.index')->with('success', 'Review created successfully.');
    }

    public function edit($id)
    {
        $data['users'] = User::valid()->get();
        $data['bundles'] = Cache::rememberForever('Bundle', function () {
            return Bundle::valid()->get();
        });
        $data['review'] = $this->bundleReviewService->getReviewById($id);
        return view('Backend.admin.bundle-review.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->bundleReviewService->update($request->all(), $id);
        return redirect()->route('bundle-review.index')->with('success', 'Review updated successfully.');
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

<?php

namespace App\Services;

use App\Models\BundleReview;

class BundleReviewService
{

    public function getAllReviewsPaginated()
    {
        return BundleReview::with(['user', 'bundle'])
            ->latest()
            ->paginate(20);
    }
    public function approve($id)
    {
        $review = BundleReview::find($id);
        if(!$review){
            return response()->json(['message' => 'Review not found'], 404);
        }
        $review->is_approved = !$review->is_approved;
        $review->save();

        return response()->json([
            'message' => 'Review updated successfully'
        ]);
    }

    public function delete($id)
    {
        $review = BundleReview::find($id);
        if($review){
            $review->delete();
        }
        return response()->json(['message' => 'Review not found'], 404);
    }
}

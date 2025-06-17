<?php

namespace App\Services;

use App\Models\ProductReview;

class ProductReviewService
{

    public function getAllReviewsPaginated()
    {
        return ProductReview::with(['user', 'product'])
            ->latest()
            ->paginate(20);
    }
    public function approve($id)
    {
        $review = ProductReview::find($id);
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
        $review = ProductReview::find($id);
        if($review){
            $review->delete();
        }
        return response()->json(['message' => 'Review not found'], 404);
    }
}

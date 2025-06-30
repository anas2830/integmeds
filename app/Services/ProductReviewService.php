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

    public function create($request)
    {
        if(count($request['product_id']) > 0){
            foreach($request['product_id'] as $product_id){
                ProductReview::create([
                    'product_id' => $product_id,
                    'user_id' => $request['user_id'],
                    'rating' => $request['rating'],
                    'review' => $request['review'],
                    'is_approved' => 1,
                ]);
            }
        }
    }

    public function getReviewById($id)
    {
        return ProductReview::find($id);
    }

    public function update($request, $id)
    {
        $review = ProductReview::find($id);
        $review->update([
            'product_id' => $request['product_id'],
            'user_id' => $request['user_id'],
            'rating' => $request['rating'],
            'review' => $request['review'],
        ]);
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

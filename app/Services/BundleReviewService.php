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

    public function create($request)
    {
        request()->validate([
            'bundle_id' => 'required|exists:bundles,id',
            'user_id'   => 'required|integer',
            'rating'    => 'required|numeric',
            'review'    => 'nullable|string',
        ]);

        if(count($request['bundle_id']) > 0){
            foreach($request['bundle_id'] as $bundle_id){
                BundleReview::create([
                    'bundle_id' => $bundle_id,
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
        return BundleReview::find($id);
    }

    public function update($request, $id)
    {
        request()->validate([
            'bundle_id' => 'required|exists:bundles,id',
            'user_id'   => 'required|integer',
            'rating'    => 'required|numeric',
            'review'    => 'nullable|string',
        ]);

        $review = BundleReview::find($id);
        $review->update([
            'bundle_id' => $request['bundle_id'],
            'user_id' => $request['user_id'],
            'rating' => $request['rating'],
            'review' => $request['review'],
        ]);
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

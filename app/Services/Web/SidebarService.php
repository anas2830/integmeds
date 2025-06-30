<?php

namespace App\Services\Web;

use App\Models\Bundle;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;

class SidebarService
{
    public  function productBundles()
    {
        return Bundle::select('id', 'name', 'icon_path')->with(['firstImage:id,bundle_id,image_url'])->where('status', 1)->orderBy('id', 'desc')->take(10)->get();
    }

    public function specialOffers()
    {
        return Product::select('id', 'product_name', 'slug', 'regular_price', 'sale_price', 'discount_percentage')->with(['firstImage:id,product_id,image_url'])
        ->where('status', 1)
        ->where('quantity', '>', 0)
        ->orderBy('discount_percentage', 'desc')->take(10)->get();
    }

    public function bestSellingProducts()
    {
        // Fetch top product IDs first
        $topProductIds = $this->getTopSoldProductIds();

        // Return products with related data and average rating
        return Product::select('id', 'product_name', 'regular_price', 'sale_price', 'discount_percentage', 'slug', 'quantity')
            ->with([
                'firstImage:id,product_id,image_url',
                'firstCategory:id,name,slug',
            ])
            ->withAvg('productReviews', 'rating')
            ->whereIn('id', $topProductIds)
            // ->orderByRaw('FIELD(id, ' . $topProductIds->implode(',') . ')') // optional: maintain order
            ->where('quantity', '>', 0) // Ensure products are in stock
            ->where('status', 1)
            ->get();
    }

    protected function getTopSoldProductIds()
    {
        return OrderDetails::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(10)
            ->pluck('product_id');
    }
}
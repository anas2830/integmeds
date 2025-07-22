<?php

namespace App\Services\Web;

use App\Models\Bundle;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class SidebarService
{
    public  function productBundles()
    {
        return Cache::rememberForever('Bundle', function () {
            return Bundle::select('id', 'name', 'icon_path')->with(['firstImage:id,bundle_id,image_url'])->where('status', 1)->paginate(8);
        });
    }

    public function specialOffers()
    {
        return Cache::rememberForever('Product', function () {
            return Product::select('id', 'product_name', 'slug', 'regular_price', 'sale_price', 'discount_percentage', 'quantity')->with(['firstImage:id,product_id,image_url'])->where('status', 1)->where('quantity', '>', 0)->orderBy('discount_percentage', 'desc')->take(10)->get();
        });
    }

    public function bestSellingProducts()
    {
        $topProductIds = $this->getTopSoldProductIds();
        return Product::select('id', 'product_name', 'regular_price', 'sale_price', 'discount_percentage', 'slug', 'quantity')
            ->with([
                'firstImage:id,product_id,image_url',
                'firstCategory:id,name,slug',
            ])
            ->withAvg('productReviews', 'rating')
            ->whereIn('id', $topProductIds)
            ->where('quantity', '>', 0)
            ->where('status', 1)
            ->get();

    }

    protected function getTopSoldProductIds()
    {
        return Cache::rememberForever('OrderDetails', function() {
            return OrderDetails::select('product_id', DB::raw('SUM(quantity) as total_sold'))
                ->groupBy('product_id')
                ->orderByDesc('total_sold')
                ->take(10)
                ->pluck('product_id');
        });
    }
}
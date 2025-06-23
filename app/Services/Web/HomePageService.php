<?php


namespace App\Services\Web;

use App\Models\Slider;
use App\Models\Product;


class HomePageService extends SidebarService
{
    public function homePageData()
    {
        return [
            'sliders' => $this->getSliders(),
            'productBundles' => $this->productBundles(),
            'specialOffers' => $this->specialOffers(),
            'bestSellingProducts' => $this->bestSellingProducts(),
            'newArrivals' => $this->newArrivals(),
            'topRatedProducts' => $this->topRatedProducts(),
        ];
    }

    public function getSliders()
    {
        return Slider::select('title','slider_image')->where('status', 1)->take(5)->get();
    }
    public function newArrivals()
    {
        return Product::select('id', 'product_name', 'regular_price', 'sale_price', 'discount_percentage', 'slug')
            ->with(['firstImage:id,product_id,image_url'])
            ->where('status', 1)
            ->latest('created_at')
            ->take(10)
            ->get();
    }

    public function topRatedProducts()
    {
        return Product::select('id', 'product_name', 'regular_price', 'sale_price', 'discount_percentage', 'slug')
            ->with(['firstImage:id,product_id,image_url'])
            ->withAvg('productReviews', 'rating')
            ->where('status', 1)
            ->having('product_reviews_avg_rating', '>', 0) // Exclude products with NULL or 0 rating
            ->orderByDesc('product_reviews_avg_rating')
            ->take(10)
            ->get();
    }
}
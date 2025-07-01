<?php


namespace App\Services\Web;

use App\Models\Slider;
use App\Models\Product;
use App\Models\HomePageBody;
use App\Models\HomeSidebarBanner;
use App\Models\HomePageFeaturedProduct;
use Illuminate\Support\Facades\Cache;


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
            'sidebarBanners' => $this->getSidebarBanners(),
            'featuredProducts' => $this->getFeaturedProducts(),
            'HomePageBanners' => $this->getHomePageBanners(),
        ];
    }

    public function getSliders()
    {
        return Cache::rememberForever('Slider', function() {
            return Slider::select('title','slider_image')->where('status', 1)->take(5)->get();
        });
    }
    public function newArrivals()
    {

        $productIds = Cache::rememberForever('new_arrival_product_ids', function () {
            return Product::where('status', 1)
                ->latest('created_at')
                ->take(10)
                ->pluck('id');
        });

        return Product::select('id', 'product_name', 'regular_price', 'sale_price', 'discount_percentage', 'slug', 'quantity')
            ->with(['firstImage:id,product_id,image_url', 'firstCategory:id,name,slug'])
            ->whereIn('id', $productIds)
            ->get();
    }

    public function topRatedProducts()
    {
        return Cache::remember('topRatedProducts', 60, function() {
            return Product::select('id', 'product_name', 'regular_price', 'sale_price', 'discount_percentage', 'slug', 'quantity')
            ->with(['firstImage:id,product_id,image_url', 'firstCategory:id,name,slug'])
            ->withAvg('productReviews', 'rating')
            ->where('status', 1)
            ->having('product_reviews_avg_rating', '>', 0) // Exclude products with NULL or 0 rating
            ->orderByDesc('product_reviews_avg_rating')
            ->take(10)
            ->get();
        });
    }

    public  function getSidebarBanners()
    { 
        return Cache::rememberForever('HomeSidebarBanner', function() {
            return HomeSidebarBanner::select('title', 'short_description', 'button_text', 'button_url', 'image_path')->where('status', 1)->get();
        });
    }

    public function getFeaturedProducts()
    {
        return Cache::rememberForever('HomePageFeaturedProduct', function() {
            return HomePageFeaturedProduct::with([
                'product:id,product_name,slug,regular_price,sale_price',
                'product.firstImage:id,product_id,image_url,'
            ])
            ->select('id', 'product_id', 'btn_text', 'btn_url')
            ->limit(3)
            ->get();
        });
    }

    public function getHomePageBanners()
    {
        return Cache::rememberForever('HomePageBody', function() {
            $homePageBanners = HomePageBody::select(
                'banner_1_cover_image',
                'banner_1_featured_image',
                'banner_1_title',
                'banner_1_description',
                'banner_1_btn_text',
                'banner_1_btn_url',
                'banner_2_image',
                'banner_2_title',
                'banner_2_description',
                'banner_2_btn_text',
                'banner_2_btn_url'
            )->first();
            
            $data['home_banner_1'] = [
                'cover_image'    => $homePageBanners->banner_1_cover_image,
                'featured_image' => $homePageBanners->banner_1_featured_image,
                'title'          => $homePageBanners->banner_1_title,
                'description'    => $homePageBanners->banner_1_description,
                'btn_text'       => $homePageBanners->banner_1_btn_text,
                'btn_url'        => $homePageBanners->banner_1_btn_url,
            ];

            $data['home_banner_2'] = [
                'image'       => $homePageBanners->banner_2_image,
                'title'       => $homePageBanners->banner_2_title,
                'description' => $homePageBanners->banner_2_description,
                'btn_text'    => $homePageBanners->banner_2_btn_text,
                'btn_url'     => $homePageBanners->banner_2_btn_url,
            ];
            return $data;
        });
    }
}
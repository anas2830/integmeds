<?php


namespace App\Services;

use App\Models\Bundle;
use App\Models\Slider;
use App\Models\Product;

class HomePageService
{
    public function homePageData()
    {
        return [
            'sliders' => $this->getSliders(),
            'productBundles' => $this->productBundles(),
            'specialOffers' => $this->specialOffers(),
        ];
    }

    public function getSliders()
    {
        return Slider::select('title','slider_image')->where('status', 1)->take(5)->get();
    }

    public  function productBundles()
    {
        return Bundle::select('id','name','icon_path')->with(['firstImage:id,bundle_id,image_path'])->where('status', 1)->orderBy('id', 'desc')->take(8)->get();
    }

    public function specialOffers()
    {
        return Product::select('id', 'product_name', 'slug','regular_price', 'sale_price', 'discount_percentage')->with(['firstImage:id,product_id,image_url'])->where('status', 1)->orderBy('discount_percentage', 'desc')->take(10)->get();
    }
}
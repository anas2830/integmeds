<?php


namespace App\Services;

use App\Models\Bundle;
use App\Models\Slider;

class HomePageService
{
    public function homePageData()
    {
        return [
            'sliders' => $this->getSliders(),
            'productBundles' => $this->productBundle(),
        ];
    }

    public function getSliders()
    {
        return Slider::select('title','slider_image')->where('status', 1)->take(5)->get();
    }

    public  function productBundle()
    {
        return Bundle::select('id','name','icon_path')->with('firstImage')->where('status', 1)->take(8)->get();
    }
}
<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function category()
    {
        return view('Web.Layout.pages.category');
    }
    public function bundle()
    {
        return view('Web.Layout.pages.bundle');
    }
    public function bundleDetails()
    {
        return view('Web.Layout.pages.bundle-details');
    }
    public function productDetails()
    {
        return view('Web.Layout.pages.product-details');
    }
    public function aboutUs()
    {
        return view('Web.Layout.pages.about-us');
    }
    public function contact()
    {
        return view('Web.Layout.pages.contact');
    }
    public function privacyPolicy()
    {
        return view('Web.Layout.pages.privacy-policy');
    }
    public function termsCondition()
    {
        return view('Web.Layout.pages.terms-condition');
    }
    public function cart()
    {
        return view('Web.Layout.pages.cart');
    }
    public function checkout()
    {
        return view('Web.Layout.pages.checkout');
    }
}

<?php

namespace App\Http\Controllers\ViewComposers;

use Cart;
use App\Models\Bundle;
use App\Models\Product;
use Illuminate\View\View;
use App\Models\ProductCategory; // Make sure these are correct

class HeaderComposer
{
    public function compose(View $view)
    {
        $categories = ProductCategory::where('status', true)->get(['id', 'name', 'slug']);
        $bundles = Bundle::where('status', 1)->get(['id', 'name']);
        $cartData = Cart::getContent();
        $cartDataCount = Cart::getTotalQuantity();
        $cartSubtotal = Cart::getSubTotal();
        // $stockCheck = Product::where('status', 1)->value('quantity') > 0 ? true : false;

        $view->with([
            'categories' => $categories,
            'bundles' => $bundles,
            'cartData' => $cartData,
            'cartDataCount' => $cartDataCount,
            'cartSubtotal' => $cartSubtotal,
            // 'stockCheck' => $stockCheck,
        ]);

    }
}
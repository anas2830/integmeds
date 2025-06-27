<?php

namespace App\Http\Controllers\ViewComposers;

use Illuminate\View\View;
use App\Models\ProductCategory; // Make sure these are correct
use App\Models\Bundle;

class HeaderComposer
{
    public function compose(View $view)
    {
        $categories = ProductCategory::where('status', true)->get(['id', 'name', 'slug']);
        $bundles = Bundle::where('status', 1)->get(['id', 'name']);

        $view->with([
            'categories' => $categories,
            'bundles' => $bundles,
        ]);
    }
}
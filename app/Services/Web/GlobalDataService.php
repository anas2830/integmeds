<?php

// app/Services/GlobalDataService.php

namespace App\Services\Web;

use App\Models\Bundle;
use App\Models\ProductCategory;

class GlobalDataService
{
    public function getCategories()
    {
        return ProductCategory::where('status', true)->get(['id', 'name', 'slug']);
    }

    public function getBundles()
    {
        return Bundle::where('status', 1)->get(['id', 'name']);
    }
}
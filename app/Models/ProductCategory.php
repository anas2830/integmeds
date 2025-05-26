<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_product_categories');
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function scopeValid($query)
    {
        return $query->where('status', 1);
    }
}

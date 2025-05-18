<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_categories');
    }

    public function brands()
    {
        return $this->belongsToMany(ProductBrand::class, 'product_product_brands');
    }

    public function tags()
    {
        return $this->belongsToMany(ProductTag::class, 'product_product_tags');
    }

    public function sizes()
    {
        return $this->belongsToMany(ProductSize::class, 'product_product_sizes');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_details');
    }

    public function scopeValid($query)
    {
        return $query->where('status', 1);
    }
}

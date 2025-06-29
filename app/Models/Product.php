<?php

namespace App\Models;

use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\RemoveModelCache;


class Product extends Model
{
    use HasFactory, SoftDeletes, RemoveModelCache;

    protected $guarded = ['id'];

    public function firstImage()
    {
        return $this->hasOne(ProductImage::class)->orderBy('id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function videos()
    {
        return $this->hasMany(ProductVideo::class);
    }


    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_categories');
    }

    public function firstCategory()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_categories')
            ->orderBy('product_product_categories.product_category_id') // or order by 'id' if you want
            ->limit(1);
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

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'product_id');
    }

    public function inventory()
    {
        return $this->hasOne( Inventory::class);
    }

    public function stockLedgers()
    {
        return $this->hasMany(StockLeadger::class);
    }

    public function scopeValid($query)
    {
        return $query->where('status', 1);
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id')
            ->where('is_approved', 1);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}

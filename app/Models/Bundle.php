<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $guarded = [];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'bundle_products', 'bundle_id', 'product_id');
    }

    public function bundleImages()
    {
        return $this->hasMany(BundleImage::class);
    }

    public function bundleReviews()
    {
        return $this->hasMany(BundleReview::class, 'bundle_id')
            ->where('is_approved', 1);
    }

    public function firstImage()
    {
        return $this->hasOne(BundleImage::class);
    }
}

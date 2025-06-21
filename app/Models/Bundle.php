<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $gurded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'bundle_products', 'bundle_id', 'product_id');
    }

    public function bundleImages()
    {
        return $this->hasMany(BundleImage::class);
    }

    public function firstImage()
    {
        return $this->hasOne(BundleImage::class);
    }
}

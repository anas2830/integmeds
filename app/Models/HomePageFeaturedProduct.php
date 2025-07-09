<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RemoveModelCache;

class HomePageFeaturedProduct extends Model
{
    use RemoveModelCache;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

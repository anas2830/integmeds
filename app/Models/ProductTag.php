<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RemoveModelCache;

class ProductTag extends Model
{
    use RemoveModelCache;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_product_tags');
    }
}

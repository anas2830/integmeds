<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BundleReview extends Model
{
    protected $guarded = [];

    public function bundle()
    {
        return $this->belongsTo(Bundle::class, 'bundle_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

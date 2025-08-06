<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RemoveModelCache;

class HomePageBody extends Model
{
    use RemoveModelCache;
    protected $guarded = [];
}

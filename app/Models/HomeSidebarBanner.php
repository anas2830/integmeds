<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RemoveModelCache;

class HomeSidebarBanner extends Model
{
    use RemoveModelCache;
    protected $guarded = [];
}

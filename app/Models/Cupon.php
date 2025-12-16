<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Cupon extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeValid($query)
    {
        return $query->where('status', 1);
    }

    public function delete()
    {
        $uuid = Str::uuid();
        $this->code .= '-deleted-'.$uuid;
        $this->save();
        return parent::delete();
    }
}

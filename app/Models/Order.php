<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'billing_address'  => 'array',
        'shipping_address' => 'array',
    ];
    
    public function delete()
    {
        $uuid = Str::uuid();
        $this->order_number .= '-deleted-'.$uuid;
        $this->save();
        return parent::delete();
    }
}

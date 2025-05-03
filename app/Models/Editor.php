<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Editor extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes; // Added Notifiable trait

    protected $guard = 'editor'; // This property is not needed for the guard; it's set in routes and guards configuration.

    protected $guarded = ['id', 'created_at', 'updated_at']; // Use guarded carefully; consider fillable for security.

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at']; // To ensure deleted_at is treated as a Carbon date instance.

    // Scope to filter valid editors
    public function scopeValid($query)
    {
        return $query->where('status', 1);
    }
}

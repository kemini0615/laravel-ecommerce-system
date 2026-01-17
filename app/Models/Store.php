<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'logo',
        'banner',
        'name',
        'address',
        'phone',
        'email',
        'short_description',
        'long_description'
    ];
}

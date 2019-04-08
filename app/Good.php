<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    // Товары
    
    protected $fillable = [
        'name',
        'price',
        'hide'
    ];
}

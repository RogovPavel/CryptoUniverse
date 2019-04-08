<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'good_id',
        'user_id',
        'sale'
    ];
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    
    public function good()
    {
        return $this->hasOne('App\Good', 'id', 'good_id');
    }
}

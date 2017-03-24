<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_name', 'order_name', 'status','date'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}

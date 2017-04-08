<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'application','name','sex'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

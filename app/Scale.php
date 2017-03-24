<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model
{
    protected $fillable = [
        'name','role_name','user_id','title','number','total'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

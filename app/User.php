<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','sex','birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $admin = '1473949341@qq.com';

    public function is_admin()
    {
        return $this->email == $this->admin?true:false;
    }

    public function scale()
    {
        return $this->hasMany('App\Scale');
    }

    public function role()
    {
        return $this->belongsToMany('App\Role');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function permission()
    {
        return $this->hasMany('App\Permission');
    }

    public function order()
    {
        return $this->belongsToMany('App\order');
    }

}

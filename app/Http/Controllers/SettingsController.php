<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
    }
    //系统设置
    public function system()
    {
        return view('settings/system');
    }
    //数据备份
    public function data()
    {
        return view('settings/data');
    }
    //角色管理
    public function rolemanage()
    {
        return view('settings.rolemanage');
    }
    //成员管理
    public function membermanage()
    {
        $users = User::with('roles.perms')->get();
        $roles = Role::get();
        return view('settings/membermanage',compact('users','roles'));
    }

    public function power()
    {
        return view('settings/power');
    }

    public function add()
    {
        return view('settings/add');
    }

}

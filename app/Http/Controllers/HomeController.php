<?php

namespace App\Http\Controllers;

use App\Application;
use App\Permission;
use App\Role;
use App\Scale;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\order;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('perms')->get();
        return view('home',compact('roles'));
    }

    public function welcome()
    {
        //$users = Auth::user()->where('permission',0)->first();
        $users = \Auth::user();
        $roles = Auth::user()->role()->first();
        if(!$roles){
            if($users->permission == 0)
            {
                $role = Role::where('name','user')->first();
                $users->attachRole($role);
            }
        }
        $orders = order::where(['status'=>0,'order_name'=>$users->name])->get();
        $Doneorder = order::where(['status'=>1,'order_name'=>$users->name])->get();
        $scales = Auth::user()->scale()->get();
        $applies = Application::where('application',0)->get();
        //$roles = Auth::user()->role()->get();
        //$users = Auth::user()->where('permission',0)->get();
        //dd($users);
       /* foreach($roles as $role)
        {
            //dd($role->name);
            if($role->name == 'admin'){
                $scales = Scale::get(['name','user_id']);
                $users = User::get();
               // $roles = Role::get();
            }
        }*/
        //dd($a);
        //$users = \Auth::user();
        //dd($users->toArray());
        //$roles = Role::with('perms')->get();
        // $scales = Scale::get(['name','user_id']);
        //$ab = $roles->toArray();
       // dd($ab[0]['name']);
        /*foreach ($users as $user) {
            Scale::create([
                'name' => $user->name,
                'user_id' => $user->id
            ]);
        }
        foreach ($roles as $role) {
            Scale::create([
                'role_name' => $role->name
            ]);
        }*/
        return view('home',compact('scales','orders','Doneorder','applies'));
    }

    //向个人资料页面传递数据
    public function profile()
    {
        $user = Auth::user();
        return view('profile',compact('user'));
    }

    //用户申请成为咨询师
    public function apply()
    {
        $user = Auth::user();
        $apply = Application::where('user_id',$user->id)->first();
        if(!$apply){
            Application::create(
                [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'sex' => $user->sex,
                    'application' => '0'
                ]);
        }

        return Redirect::back();
    }

    //管理员处理申请
    public function deal_apply()
    {
        $now = Application::where('user_id',$_GET['id'])->first();
        $deal = Application::findOrFail($now->id);
        $deal->application = 1;
        $deal->save();

        $user = User::findOrFail($_GET['id']);
        $user->permission = 1;
        $user->save();
        $role_manage = Role::where('name','role_manage')->first();
        $user->attachRole($role_manage);
        $users = Role::where('name','user')->first();
        $user->roles()->detach($users);

        return Redirect::back();

    }
}

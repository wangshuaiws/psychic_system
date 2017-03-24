<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ConsultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Reservation_consultation',['except' => 'appointmy']);

    }
    //参数设置
    public function appointsetting()
    {
        return view('consult/appointsetting');
    }
    //预约管理
    public function appointmanage()
    {
        return view('consult/appointmanage');
    }
    //个案辅导
    public function appointcoach()
    {
        return view('consult/appointcoach');
    }
    //我的预约
    public function appointmy()
    {

         /*$a = Role::where('name','role_manage')->first();
         $bs = DB::table('role_user')->where('role_id',$a->id)->get();
         foreach ($bs as $b) {
            $role_manages = User::where('id',$b->user_id)->first();
         }*/
        //传入预约状态 将咨询师名称传入
        $users = \Auth::user();
        $noorder = order::where(['status'=>0,'user_name'=>$users->name])->get();
        $yesorder = order::where(['status'=>1,'user_name'=>$users->name])->get();
        $role_manage = Role::find(2)->user->lists('name','id');
        //$ab = User::where('permission',1)->lists('name','id');
        //$a = $ab::pluck('name','id');
         //$roles = Role::find(2)->user;
         //$ab = $roles->first();
         //dd($ab);
         //$role_manages = $ab::lists('name','id')->where('permission',1);
         //dd($role_manages);
        //$role = Role::where('name','role_manage')->first();
        //$role_manage = User::where($role->id)->get();
        return view('consult/appointmy',compact('role_manage','noorder','yesorder'));
    }

    public function order()
    {
        $Done = order::find($_GET['id']);
        $Done->status = 1;
        $Done->save();
        return Redirect::back();
    }
}

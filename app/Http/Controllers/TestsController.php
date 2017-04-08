<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Scale;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class TestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:psychological_test',['except' => 'gaugecheck']);
    }
    //量表管理
    public function gaugemanage()
    {
        return view('tests/gaugemanage');
    }
    //量表分配
    public function gaugeallot()
    {
       // $scales = Auth::user()->scale()->get(['name','user_id']);
        //$roles = Auth::user()->role()->get();
        //$users = Auth::user()->where('permission',0)->get();
        //dd($users);
        $roles = Role::get();
        $scales = Scale::get();
        $users = Auth::user()->where('permission',0)->get();
        return view('tests/gaugeallot',compact('roles','users','scales'));
    }
    //测试结果录入
    public function gaugeinput()
    {
        return view('tests/gaugeinput');
    }
    //查看测试结果
    public function gaugecheck()
    {
        $scales = Auth::user()->scale()->where('id',$_GET['id'])->first();
        if($scales->title == '汉密尔顿抑郁量表')
        {
            $ab = json_decode($scales->number,true);
            $a = $ab['0']; $b = $ab['1'];
            $c = $ab['2']; $d = $ab['3'];
            $e = $ab['4']; $f = $ab['5'];
            $g = $ab['6'];
            //$scales = Scale::findOrFail($_GET['id'])->get();
            $scales = Auth::user()->scale()->where('id',$_GET['id'])->get();
            //向结果页面传递数据
            return view('tests/gaugecheck',compact('scales','a','b','c','d','e','f','g'));
        }

        if($scales->title == '汉密尔顿焦虑量表')
        {
            $ab = json_decode($scales->number,true);
            $a = $ab['0'];
            $b = $ab['1'];
            //$scales = Scale::findOrFail($_GET['id'])->get();
            $scales = Auth::user()->scale()->where('id',$_GET['id'])->get();
            //向结果页面传递数据
            return view('tests/gaugecheck',compact('scales','a','b'));
        }

    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scale;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class RecycleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //回收站
    public function recycle()
    {
        $scales = Auth::user()->scale()->where('is_remove',1)->get();
        return view('recycle/recyclebin',compact('scales'));
    }

    //删除量表到回收站
    public function delete()
    {
        $scale = Scale::findOrFail($_GET['id']);
        //$scale = Scale::where('id',$_GET['id'])->get();
        $scale->is_remove = 1;
        $scale->save();
        return Redirect::back();
    }

    //还原量表
    public function restore()
    {
        $scale = Scale::findOrFail($_GET['id']);
        //$scale = Scale::where('id',$_GET['id'])->get();
        $scale->is_remove = 0;
        $scale->save();
        return Redirect::back();
    }
    //彻底删除量表
    public function cancel()
    {
        $scales = Auth::user()->scale()->where('is_remove',1)->get();
        foreach($scales as $scale)
        {
            Scale::find($scale->id)->delete();
        }
        return Redirect::back();
    }


}

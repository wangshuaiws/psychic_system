<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WarningsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:crisis_warning',['only' => 'warnsetting']);
    }
    //查看预警
    public function warnsee()
    {
        return view('warnings/warnsee');
    }
    //预警设置
    public function warnsetting()
    {
        return view('warnings/warnsetting');
    }
}

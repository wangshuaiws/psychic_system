<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;
use App\Scale;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加预约
    public function create()
    {
        $users = \Auth::user();
        $order = User::where('id',$_GET['namelist'])->first();
        if($_GET['dateSelect'])
        {
            order::create([
                'user_name' => $users->name,
                'order_name' => $order->name,
                'status' => 0,
                'date' => $_GET['dateSelect']
            ]);
        }
        return Redirect::back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   //插入权限
    public function store(Request $request)
    {
            $perm = Permission::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'description' => $request->description
            ]);

            return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //查看量表逻辑
    public function show($id)
    {
        $scale = Scale::where('id',$id)->first();
        if($scale->title == '汉密尔顿抑郁量表')
        {
            $scale = Scale::where('id',$id)->get();
            return view('tests/depressed',compact('scale'));
        }

        if($scale->title == '症状自评量表(SCL-90)')
        {
            $scale = Scale::where('id',$id)->get();
            return view('tests/depressed',compact('scale'));
        }

        if($scale->title == '汉密尔顿焦虑量表')
        {
            $scale = Scale::where('id',$id)->get();
            return view('tests/anxious',compact('scale'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //处理分配角色量表逻辑
    public function edit(Request $request,$id)
    {
        if($_GET) {
            $as = array();
            $bs = array();
            foreach ($_GET as $key => $value) {
                if (gettype($key) == "integer") {
                    $as[$key] = $value;
                }
                if (gettype($key) == "string") {
                    $bs[$key] = $value;
                }
            }
            foreach ($as as $aa => $a) {
                foreach ($bs as $b) {
                    $user = Auth::user()->where('email', $a)->first();
                    $scale = Scale::where(['name' => $user->name, 'title' => $b])->first();
                    if (!$scale) {
                        Scale::create([
                            'name' => $user->name,
                            'user_id' => $user->id,
                            'title' => $b
                        ]);
                    }
                }
            }
        }
        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //处理用户所填写的量表
    public function update(Request $request, $id)
    {
        $scale = Scale::where('id',$id)->first();
        if($scale->title == '汉密尔顿抑郁量表'){
            if(count($_POST)<27)
            {
                return Redirect::back();
            }
            $b = depressed_total(array_sum($_POST));
            //$a = array_sum($_GET);
            $a = json_encode(depressed_deal($_POST));
            $scale = Scale::findOrFail($id);
            $scale->number = $a;
            $scale->total = $b;
            $scale->completed = 1;
            $scale->save();
        }

        if($scale->title == '汉密尔顿焦虑量表'){
            if(count($_POST)<16)
            {
                return Redirect::back();
            }
            $b = anxious_total(array_sum($_POST));
            //$a = array_sum($_GET);
            $a = json_encode(anxious_deal($_POST));
            $scale = Scale::findOrFail($id);
            $scale->number = $a;
            $scale->total = $b;
            $scale->completed = 1;
            $scale->save();
        }
       // dd(deal($_POST));
        return Redirect::back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        /*$scale = Scale::where('id',$id)->get();
        $scale->is_remove = 1;
        $scale->save();*/
       return Redirect::back();
    }

}

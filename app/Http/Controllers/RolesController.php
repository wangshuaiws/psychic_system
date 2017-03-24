<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:admin');
        $this->middleware('permission:edit_role',['only' => 'update']);
        $this->middleware(['permission:delete_role','protect.admin.role'],['only' => 'destroy']);
    }

    public function index()
    {
        $roles = Role::with('perms')->get();
        $perms = Permission::get();
        return view('auth.roles.index',compact('roles','perms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);

        if($request->perm){
            $role->attachPermissions($request->perm);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->permission = '1';
        $user->save();
        if($roleArray = $request->role){
            $user->roles()->sync($roleArray);
        }else{
            $user->roles()->detach();
        }

        if($user->is_admin())
        {
            $admin = Role::where('name','admin')->first();
            $user->attachRole($admin);
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        if($role->name !=='admin'){
            $role->name = $request->name;
        }
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        $role->savePermissions($request->perm);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        //dd($role);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Permission;
use App\Model\admin\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$roles = Role::all();
    	return view('admin.role.show', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|max:50|unique:roles'
    	]);

    	$role = new Role;
    	$role->name = $request->input('name');
    	$role->save();
        $role->permissions()->sync($request->permission);
        return redirect()->route('role.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	return 123;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    	$role = Role::where('id', $id)->first();
       $permissions = Permission::all();
       return view('admin.role.edit', compact('role', 'permissions'));
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
        //return $request->all();
    	$this->validate($request, [
    		'name' => 'required|max:50'
    	]);

    	$role = Role::find($id);
    	$role->name = $request->input('name');
    	$role->save();
        $role->permissions()->sync($request->permission);

       return redirect()->route('role.index')->with('success', 'Role updated successfully');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	Role::where('id', $id)->delete();
    	return back();
    }
}

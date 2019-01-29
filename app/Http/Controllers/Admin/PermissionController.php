<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
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
        $permissions = Permission::all();
        return view('admin.permission.show', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name' => 'required|max:50|unique:permissions',
            'for' => 'required'
        ]);

        $permissions = new Permission;
        $permissions->name = $request->input('name');
        $permissions->for = $request->input('for');
        $permissions->save();

        return redirect(route('permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permission = Permission::find($permission->id);
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'for' => 'required'
        ]);

        $permissions = Permission::where('id', $permission->id)->first();
        $permissions->name = $request->input('name');
        $permissions->for = $request->input('for');
        $permissions->save();

        return redirect(route('permission.index'))->with('success', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        Permission::where('id', $permission->id)->delete();
        return back()->with('delete', 'Permission Deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Admin;
use App\Model\admin\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:posts.userEdit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::all();
        return view('admin.users.show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
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
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins',
        'phone_number' => 'required|numeric',
        'password' => 'required|string|min:6|confirmed',
    ]);
       $request['password'] = bcrypt($request->input('password'));

       $users = Admin::create($request->all());
       $users->roles()->sync($request->role);
       return redirect(route('users.index'));
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
    public function edit($id)
    {
        $user = Admin::find($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
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
        $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone_number' => 'required|numeric',
    ]);
        //$request['password'] = bcrypt($request->input('password'));
        $request->status? : $request['status'] = 0;
        //return $request->all();
        $user = Admin::where('id', $id)->update($request->except('_token', '_method', 'submit', 'role'));
        Admin::find($id)->roles()->sync($request->role);
        return redirect(route('users.index'))->with('success', 'Deleted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
        return back()->with('delete', 'Admin Deleted Successfully');
    }
}

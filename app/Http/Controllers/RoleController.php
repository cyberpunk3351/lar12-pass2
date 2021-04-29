<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $users = User::find($id);
        $roles = Role::with('user')->get();
        //dd($users);
        return view('admin.edit', compact('users', 'roles'));
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
        $role = User::find($id);
        $role->role_id = $request->role_id;
        $role->update();
        // dd($id);
        return redirect()->route('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function role()
    {
        $roles = Role::with('category')->get();

        //dd($roles);

        return view('admin.role', compact('roles'));
    }
}

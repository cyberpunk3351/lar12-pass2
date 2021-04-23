<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Pass;


class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        $users = User::get();
        //dd($users);
        return view('admin.index', compact('users'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category()
    {
        $cats = Category::with('roles')->get();;
        // dd($cats);
        return view('admin.cat', compact('cats'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function catedit($id) {
        $cats = Category::find($id);
        //dd($users);
        return view('admin.catedit', compact('cats'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function catcreate() {
        return view('admin.catCreate');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecat(Request $request, $id)
    {
        $cats = Category::find($id);
        $cats->title = $request->title;
        // $cats->editor = $request->role_id;
        $cats->update();
        // dd($id);
        return redirect()->route('category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function catstore(Request $request) {
        $pass = new Category();
        $pass->title = $request->title;
        $pass->save();
        return redirect()->route('category');
    }
}

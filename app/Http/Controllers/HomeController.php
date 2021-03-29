<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Pass;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $id = Auth::user()->id;
        $currentuser = User::find($id);
        $user = $currentuser->name;
        $role = Role::find($id);
        $rolename = $role->title;
        $passes = Pass::with('category')->where('user_id', '=', $id)->get();
        //dd($passId);

        return view('dashboard', compact('user','passes', 'rolename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categorys = Category::all();
        // dd($roles);
        return view('create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $id = Auth::user()->id;
        $pass = new Pass();
        $pass->title = $request->title;
        $pass->category_id = $request->category_id;
        $pass->user_id = $id;
        $pass->save();
        return view('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pass = Pass::find($id);
        $categorys = Category::all();
        
        //dd($categorys);
        return view('edit', compact('pass', 'categorys'));
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

        $pass = Pass::find($id);
        $pass->title = $request->title;
        $pass->category_id = $request->category_id;
        $pass->user_id = $id;
        $pass->update();
        $id = $pass->pass_id;
        // dd($id);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pass = Pass::find($id);
        $pass->delete();
        return redirect()->route('dashboard');
    }
}

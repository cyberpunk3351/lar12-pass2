<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Pass;
use App\Models\Category;


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
        $id = Auth::user()->id;
        $users = User::with('role')->where('id', $id)->get();
        $passprivate = Pass::with('user', 'category')->where('user_id', $id)->where('private', 1)->get();
        $passcommon = Pass::with('user', 'category')->where('private', 0)->get();
        // dd($id);
        return view('dashboard', compact('users', 'passprivate', 'passcommon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categorys = Category::all();
        // dd($pass);
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
        $pass->source = $request->source;
        $pass->category_id = $request->category_id;
        $pass->user_id = $id;
        if($request->has('common')){
            $pass->private = 0;
        }else{
            $pass->private = 1;
        }
        $pass->save();
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pass = Pass::find($id);
        $categorys = Category::with('pass')->get();

        //dd($pass);
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
        if($request->has('common')){
            $pass->private = 0;
        }else{
            $pass->private = 1;
        }
        // $pass->user_id = $id;
        $pass->update();
        // $id = $pass->pass_id;
        // dd($id);
        return redirect()->route('home');
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
        return redirect()->route('home');
    }

}

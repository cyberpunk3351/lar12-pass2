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
        return view('dashboard', compact('users', 'passprivate', 'passcommon'));
    }

}

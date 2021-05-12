<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Role;
use App\Models\Password;
use App\Models\Category;
use App\Models\Permission;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the Categories and Roles connections dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $id = Auth::user()->id;
        $roles = Role::with('categories')->get();
        $categories = Category::with('roles')->get();
        // dd($roles);
        return view('admin.permission.index', compact('roles', 'categories'));
    }
}

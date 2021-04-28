<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\Category;


class CategoriesRolesConnectionsController extends Controller
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
     * Update connections.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request) {

        $input = $request->get('category', []);
        foreach (Category::all() as $category) {
            $category->roles()->sync(Arr::get($input, $category->id, []));
        }
        // dd($category);
        return view('home');
    }
}

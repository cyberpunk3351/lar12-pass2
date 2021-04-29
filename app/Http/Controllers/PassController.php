<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Pass;
use Illuminate\Support\Facades\Auth;

class PassController extends Controller
{
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
        $pass->private = $request->private ? 1 : 0;

        // if($request->has('common')){
        //     $pass->private = 0;
        // }else{
        //     $pass->private = 1;
        // }

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
        $pass->private = $request->private ? 0 : 1;

        // if($request->has('common')){
        //     $pass->private = 0;
        // }else{
        //     $pass->private = 1;
        // }

        $pass->update();
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

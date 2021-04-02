<?php

namespace App\Http\Middleware;

use App\Models\Pass;
use Closure;
use Auth;
use Illuminate\Http\Request;

class CanEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $editor = Pass::where('id', $request->id)->first()->private;

        if ($editor == 1 || Auth::user()->role_id == 1) {
            //dd($editor);
            return $next($request);
        }

        return redirect('home')->with('error','You have not access');
    }
}


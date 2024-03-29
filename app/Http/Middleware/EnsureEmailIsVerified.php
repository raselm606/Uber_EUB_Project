<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && !$request->user()->hasVerifiedEmail()) {
            return redirect()->route('home');
        }
        if(Auth::check())
        {
            if(Auth::user()->user_type == '2' || Auth::user()->user_type == '1') //rider & user
            {
                return $next($request);
            }else
            {
                return redirect('/home')->with('status','Access Denied! as you are not as admin');
            }
        }else{
            return redirect('/')->with('status','Please Login First');
        }
    }
}

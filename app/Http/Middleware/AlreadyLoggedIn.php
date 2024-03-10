<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlreadyLoggedIn
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
        if ($request->is('login') || $request->is('register')) {
            if (Auth::check()) {
                return redirect('/Home');
            }
        }
        return $next($request);

        // if (Auth::check())
        // {
        //     return redirect('/Home');
        // }
        // else
        // {
        //     return $next($request);
        // }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        //  if (!Auth::check()) {
        //     return redirect()->route('login');
        // }

    
        // if (Auth::user()->UserInfo->role_id == 1) {
        //     return redirect()->route('admin');
        // }
     if (Auth::check() && Auth::user()->UserInfo->role_id == 1) {
            return $next($request);
        }
        // if (Auth::user()->UserInfo->role_id == 3) {
        //     return redirect()->route('company');
        // }
    
    }
}

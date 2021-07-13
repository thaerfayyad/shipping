<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
             //return redirect(LaravelLocalization::setLocale().'/home');

            $user = \Auth::user();
        if( $user->active == '1' && $user->UserInfo->role_id == '2'){
            return LaravelLocalization::setLocale().'/member/profile/'.$user->UserID.'/edit';
        }elseif( $user->active == '1' && $user->UserInfo->role_id == '3'){
            return LaravelLocalization::setLocale().'/company/profile/'.$user->UserID.'/edit';
        }elseif($user->active == '1' && $user->UserInfo->role_id == '1'){
            return LaravelLocalization::setLocale().'/admin/profile/'.$user->UserID.'/edit';
        }
        }

        return $next($request);
    }
}

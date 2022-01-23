<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
        /*if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);*/
        if (Auth::check() && Auth::user()->user_type==1) {
            return redirect()->route('sellerDashboard');
        }
        if (Auth::check() && Auth::user()->user_type==0) {
            return redirect()->route('adminDashboard');   
        }
        return $next($request);
    }
}

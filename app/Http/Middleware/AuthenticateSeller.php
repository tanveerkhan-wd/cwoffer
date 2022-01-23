<?php

namespace App\Http\Middleware;
use Closure;
use Auth;

class AuthenticateSeller
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
        if (Auth::check() && Auth::User()->user_type==1) {
            return $next($request);
        }
        $error = "Access Prohibited";
        return redirect()->route('adminDashboard')->with('middleware_error',$error);
            die();    
    }
}

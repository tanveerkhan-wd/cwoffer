<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AuthenticateAdmin
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
        if (Auth::check() && Auth::User()->user_type!=1) {
            return $next($request);
        }
        $error = "Access Prohibited";
        return redirect()->back()->with('middleware_error',$error);
            die();  
    }
}

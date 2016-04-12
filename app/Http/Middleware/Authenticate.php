<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                $route = \Request::route()->getName();
                if(strpos($route,'Backend') !==False && $route !='loginBackend'){
                    return redirect()->guest('backend/login');
                }elseif ($route =='loginBackend' || $route =='getLogin') {
                      return $next($request);
                }
                return redirect()->guest('/');
            }
        }

        return $next($request);
    }
}

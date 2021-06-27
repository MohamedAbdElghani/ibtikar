<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
      if(!auth()->user()){
        return redirect(route('employee_profile.showLoginForm'));
      }
      if(auth()->user()->role == 'employee'){
        return $next($request);
      }
      return redirect(route('employee_profile.showLoginForm'));
    }
}

<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        
        if(Auth::check() && (Auth::user()->hasRole('admin') == 'admin')) {
          return $next($request);  
        }

        if(Auth::check() && (Auth::user()->hasRole('customer') == 'customer')) {
            return $next($request);
        }

        if(Auth::check() && (Auth::user()->hasRole('helper') == 'helper')) {
            return $next($request); 
        }

        return redirect()->to("/");
        
    }
}

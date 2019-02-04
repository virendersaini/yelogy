<?php

namespace App\Http\Middleware;

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

        if(Auth::check() && (Auth::user()->hasRole('admin') )) {
            return redirect('/admin');   
        }

        if(Auth::check() && (Auth::user()->hasRole('customer'))) {
            return redirect('/admin/customeradmin/dashboard');   
        }

        if(Auth::check() && (Auth::user()->hasRole('helper'))) {
            return redirect('/admin/helperadmin/dashboard');   
        }

        return $next($request);
        
    }
}

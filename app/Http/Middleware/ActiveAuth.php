<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class ActiveAuth extends Middleware
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

        if (( Request::is('Admin') ||  Request::is('Admin/*') )&& auth()->user()->active_Admin == 1)
             return $next($request);
        else
        return redirect(RouteServiceProvider::HOME);



    }
}

<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Request;

class ActiveAuth
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
        //return redirect()->route('Admin');
         //return redirect(RouteServiceProvider::ADMIN);
        if (( Request::is('Admin') ||  Request::is('Admin/*') ) && auth('res')->check())
              return $next($request);
        else
            return redirect()->route('get.admin.login');


    }
}

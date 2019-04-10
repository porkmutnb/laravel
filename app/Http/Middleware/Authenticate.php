<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

use Closure;

use Auth;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::User()) {
            if(Auth::User()->status=="admin") {
                return $next($request);
            }else{
                return Redirect::to('login');
            } 
        }else{
            return Redirect::to('login');
        }
    }
}

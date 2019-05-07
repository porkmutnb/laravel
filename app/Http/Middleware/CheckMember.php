<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

use Closure;

use Auth;

use App\User;

class CheckMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $array = Array();
        if(Auth::User()) {
            if(Auth::User()->status=="member") {
                return $next($request);
            }else{
                $result = app('App\Http\Controllers\HelperController')->Response(false, "500", "no Permission", $array);
                return $result;
            }   
        }else{
            $result = app('App\Http\Controllers\HelperController')->Response(false, "500", "no Permission", $array);
            return $result;
        }
    }
}

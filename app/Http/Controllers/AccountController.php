<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

use File;

use Carbon\Carbon;

use App\User;

use App\UserDetail;

use Auth;

class AccountController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login() {
        $input = Input::all();
        if($input['email']==null||$input['password']==null) {
            return view('login')->withError('please enter your email and password');
        }else{
            $check = User::where('email','=',$input['email'])->where('password','=',md5($input['password']))->get();
    	    if(count($check)>0) {
                $fixed = $check->map(function ($item, $key) {
                    if($item['imagePath']!=null) {
                        $dir = $item['imagePath'];
                        $array = scandir($dir, 1);
                        $item['imagePath'] = $dir."/".$array[0];
                    }
                    $item['birthdate'] = Carbon::parse($item['birthdate'])->toDateString();
                });
                Auth::login($check[0], true);
    	    	return Redirect::to('/');
    	    }else{
    	    	return view('login')->withError('email or password incorrect');
            }
        }
    }

    public function apiLogin(Request $request) {
        return $request;
    }

    public function apiRegister(Request $request) {
        return $request;
    }

    public function logout() {
        Auth::logout();
    	return Redirect::to('/');
    }
}

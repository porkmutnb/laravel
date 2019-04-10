<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use DB;

use Auth;

use File;

use Carbon\Carbon;

use App\User;

use App\UserDetail;

class SettingController extends Controller
{
    public function show() {
        $user = User::join('tbl_user_detail','tbl_user_detail.userID','=','tbl_user.userID')
                    ->join('tbl_gender','tbl_gender.genderID','=','tbl_user.genderID')
                    ->select('tbl_user.userID','tbl_user.username','tbl_user.email','tbl_user.birthdate','tbl_gender.genderName','tbl_user.imagePath','tbl_user_detail.firstName','tbl_user_detail.lastName','tbl_user_detail.address')
                    ->get();
        $fixed = $user->map(function ($item, $key) {
            if($item['imagePath']!=null) {
                $dir = $item['imagePath'];
                $array = scandir($dir, 1);
                $item['imagePath'] = $dir."/".$array[0];
            }
            $item['birthdate'] = Carbon::parse($item['birthdate'])->toDateString();
        });
        $gender = DB::table('tbl_gender')->select('genderID','genderName')->get();
        return view('profile',['user'=>$user[0], 'gender'=>$gender]);
    }

    public function update(Request $request) {
        $input = Input::all();
        $updateUser = User::where('userID','=',Auth::User()->userID)->first();
        if($input['username']!=null||$input['username']!='') {
            $updateUser->username = $input['username'];
        }
        if($input['birthdate']!=null||$input['birthdate']!='') {
            $updateUser->birthdate = Carbon::parse($input['birthdate']);
        }
        if($input['gender']!=null||$input['gender']!='') {
            $updateUser->genderID = $input['gender'];
        }
        if($request->file('image')!=null) {
            if($updateUser['imagePath']==null) {
                $random = app('App\Http\Controllers\HelperController')->RandomString(10);
                $directory = 'data-image/profile/'.$random;
                if(!File::exists($directory)) {
                    File::makeDirectory($directory);
                }
                $filename = $request->file('image')->getClientOriginalName();
                $request->file('image')->move($directory, $filename);
                $updateUser->imagePath = $directory;
            }else{
                $directory = $updateUser['imagePath'];

                $array = scandir($directory, 1);
                File::delete($directory."/".$array[0]);

                if(!File::exists($directory)) {
                    File::makeDirectory($directory);
                }
                $filename = $request->file('image')->getClientOriginalName();
                $request->file('image')->move($directory, $filename);
                $updateUser->imagePath = $directory;
            }
        }
        $updateUser->save();
        $updateUserDetail = UserDetail::where('userID','=',Auth::User()->userID)->first();
        if($input['firstName']!=null||$input['firstName']!='') {
            $updateUserDetail->firstName = $input['firstName'];
        }
        if($input['lastName']!=null||$input['lastName']!='') {
            $updateUserDetail->lastName = $input['lastName'];
        }
        if($input['address']!=null||$input['address']!='') {
            $updateUserDetail->address = $input['address'];
        }
        $updateUserDetail->save();
        $array = scandir($updateUser['imagePath'], 1);
        $updateUser['imagePath'] = $updateUser['imagePath']."/".$array[0];
        Auth::login($updateUser, true);
        return Redirect::to('profile');
    } 

    public function setting() {
        return view('setting');
    }

    public function log() {
        return view('log');
    }
}

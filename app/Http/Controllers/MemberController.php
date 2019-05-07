<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use Illuminate\Support\Facades\Input;

use File;

use DB;

use App\User;

use App\UserDetail;

class MemberController extends Controller
{
    public function index() {
        $users = User::select(DB::raw('tbl_user.*, tbl_user_detail.*, tbl_gender.genderName'))
                    ->where('tbl_user.status','=','member')
                    ->join('tbl_gender','tbl_gender.genderID','=','tbl_user.genderID')
                    ->leftJoin('tbl_user_detail','tbl_user_detail.userID','=','tbl_user.userID')
                    ->paginate(20);
        $filter = $users->map(function($item) {
            $item['birthdate'] = Carbon::parse($item['birthdate'])->toDateString();
        });
        return view('member/member',['users'=>$users]);
    }

    public function apiProfile(Request $request) {
        return $request;
    }
}

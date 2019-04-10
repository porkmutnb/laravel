<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index() {
        return view('member/member');
    }

    public function apiProfile(Request $request) {
        return $request;
    }
}

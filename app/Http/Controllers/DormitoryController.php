<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DormitoryController extends Controller
{
    public function index() {
        return view('dormitory/dormitory');
    }
}

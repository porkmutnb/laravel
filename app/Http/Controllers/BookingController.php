<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() {
        return view('dormitory/booking/booking');
    }
}

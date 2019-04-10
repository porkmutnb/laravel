<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    function RandomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $n; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))-1];
        }
        return $randstring;
    }

    function Response($errorStatus, $errorCode, $errorString, $data) {
        $result['errorStatus'] = $errorStatus;
        $result['errorCode'] = $errorCode;
        $result['errorString'] = $errorString;
        $result['data'] = $data;
        return $result;
    } 
}

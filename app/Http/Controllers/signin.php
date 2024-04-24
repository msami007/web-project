<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class signin extends Controller
{
    function index(){
        return view('sign-in');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index(){
         return view('home');
    }

    function chat(){
        return view('chat');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function getHome()
    {
        $name = "Teo Nguyen";
        $age = 27;
        // return view('layout.app', compact('name','age'));
        // return view('about', compact('name','age'));
        return view('index', compact('name','age'));
    }
}

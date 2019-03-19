<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index()
    {
        return ['Hello Controller'];
    }


    // Cach 1
    // function getUserId($id)
    // {
    //     return $id;
    // }

    // Cach 2
    function getUserId(Request $req)
    {
        return 'User id: '.$req->id;
    }

    function getUserInfo(Request $req)
    {
        return 'User id'.$req->id.'-'.$req->name;
    }

    function home()
    {
        return view('home');
    }

    function about()
    {
        $person = [
            [
                'name' => 'Ti',
                'age' => 20,
            ],

            [
                'name' => 'Teo',
                'age' => 22,
            ]
        ];

        $address = "KPT";
        return view('pages.about', compact('person','address'));
        //return view('pages.about',['person' => $array, 'diachi' => $address]);
        //return view('pages/about');
    }
}

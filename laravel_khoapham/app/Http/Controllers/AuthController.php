<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\User;

class AuthController extends Controller
{
    //
    function getRegister()
    {
        return view('pages.register');
    }

    function postRegister(Request $req)
    {
        $mess = [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.min' => 'Email có ít nhất :min ký tự',
            'email.unique' => 'Email đã có người sử dụng',
            'password_confirmation.same' => 'Password xác nhận không giống nhau'
        ];
        // $arr = [
        //     'username'=> $req->username,
        // ];
        $validator = Validator::make($req->all(),[
            'email'=>'required|email|min:10|unique:users,email',
            'username'=>'required|min:10|unique:users',
            'birthdate'=>'date',
            'password'=>'required|min:6',
            'password_confirmation' => 'same:password'
        ], $mess);
        if($validator->fails())
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        else 
            //dd($req->all());
            $user = new User;
            $user->email = $req->email;
            $user->username = $req->username;
            $user->birthdate = $req->birthdate;
            $user->password = Hash::make($req->password);
            $user->save();
            //dd($user);
    }

    function getLogin()
    {
        return view('pages.login');
    }

    function postLogin(Request $req)
    {
        
    }
}

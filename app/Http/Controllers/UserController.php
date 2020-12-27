<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    function loginForm(){
      return view('user.login');
    }

    function logout(){
        Auth::logout();

        return redirect()->route('main')->with([
            'message'=>'Just logged out',
            'error'=>false
        ]);

    }

    function login(){

        $email = request('email');
        $password = request('password');

        if (Auth::attempt([
            'email'=>$email,
            'password'=>$password
        ])){

            return redirect()->route('continent.index')->with([
                'message'=>'Welcome user',
                'error'=>false
            ]);

        }else{

            return redirect()->back()->with([
                'message'=>'Invalid login!',
                'error'=>true
            ]);

        }
    }

}

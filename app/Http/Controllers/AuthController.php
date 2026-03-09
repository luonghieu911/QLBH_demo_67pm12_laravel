<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //show login form
    public function showlogin()
    {
        return view('login');
    }

    //checklogin
    public function checklogin(Request $request){
        $account = $request->only('email', 'password');
        if(Auth::attempt($account)){
            return redirect('/admin');
        };
        return redirect('/login')->with('error', 'Email or password is incorrect');
    }
    //logout
}

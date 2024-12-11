<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function register(){
        $data = request()->all();
        session()->put('user', $data);
        return redirect('/signin')->with('success', 'Registration Successful!');
    }

    public function login () {
        $data = request()->all();
        session()->put('user.is_login', true);
        return redirect('/profile')->with('success', 'Login Successful!');
    }
}

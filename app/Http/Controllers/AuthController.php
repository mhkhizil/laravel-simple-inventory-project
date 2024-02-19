<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()  {
        return view('auth.register');
    }
    public function store(Request $request)  {
        $request->validate([
            'name'=> "required|min:4",
            'email'=> " required|email|unique:students,email",
            'password'=> "required|min:8",
            'password_confirmation'=> " same:password"
        ]);
        return $request;
    }
    public function login()  {

        return view('auth.login');
    }
    public function check()  {

    }
    public function logout()  {

    }
}

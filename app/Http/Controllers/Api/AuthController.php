<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email|unique:students,email",
            "password" => "required|min:8",
        ]);
        $student=Student::where("email",$request->email)->first();
        if (!Hash::check($request->password,$student->password)) {
           return redirect()->route('auth.login')->withErrors(["email" => "Invalid credentials"]);
        }
        session(["auth" => $student]);
        return redirect()->route('dashboard.home');

    }
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email|unique:students,email",
            "password" => "required|min:8",
            'password_confirmation' => " same:password"

        ]);
        $verify_code = rand(100000, 999999);
        //mailing
        logger("Your verification code is " . $verify_code);
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->verify_code = $verify_code;
        $student->user_token = md5($verify_code);
        $student->save();
        return response()->json([
            'message' => 'User registered successfully'
        ], 201);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|min:4",
            'email' => " required|email|unique:students,email",
            'password' => "required|min:8",
            'password_confirmation' => " same:password"
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->save();

        return redirect()->route('auth.login')->with("message", "Register successful!");
    }
    public function login()
    {

        return view('auth.login');
    }
    public function check(Request $request)
    {
        $request->validate([

            'email' => " required|email|exists:students,email",
            'password' => "required|min:8",

        ],[
            'email.exists'=>"Invalid Credentials"
        ]);
        $student=Student::where('email',$request->email)->first();
        if (!Hash::check($request->password,$student->password)) {
            return redirect()->route('auth.login')->withErrors(["email"=>"Invalid credentials"]);
        }
        session(["auth"=>$student]);
        return redirect()->route('dashboard.home');
    }
    public function logout()
    {
        session()->forget("auth");
        return redirect()->route("auth.login");
    }
}

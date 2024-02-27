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
        $verify_code=rand(100000,999999);
        //mailing
        logger("Your verification code is ".$verify_code);
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->verify_code=$verify_code;
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

        ], [
            'email.exists' => "Invalid Credentials"
        ]);
        $student = Student::where('email', $request->email)->first();
        if (!Hash::check($request->password, $student->password)) {
            return redirect()->route('auth.login')->withErrors(["email" => "Invalid credentials"]);
        }
        session(["auth" => $student]);
        return redirect()->route('dashboard.home');
    }
    public function logout()
    {
        session()->forget("auth");
        return redirect()->route("auth.login");
    }
    public function passwordChangeUI()
    {
        return view("auth.changePassword");
    }
    public function passwordChange(Request $request)
    {
        $request->validate([
            'current_password' => "required|min:8",
            'password' => "required|min:8|confirmed",

        ]);
        if (!Hash::check($request->current_password, session("auth")->password)) {
            return redirect()->back()->withErrors(["current_password" => "Password is incorrect"]);
        };
        $student = Student::find(session("auth")->id);
        $student->password = Hash::make($request->password);
        $student->update();
        session()->forget("auth");
        return redirect()->route("auth.login");
    }
    public function verifyUI(){
        return view("auth.verify");
    }
    public function verify(Request $request)  {
        $request->validate([
            "verify_code"=>"required|numeric|min:8"
        ]);
        if (session('auth')->verify_code!=$request->verify_code) {
            return redirect()->back()->withErrors(["verify_code"=>"Incorrect verification code"]);
        };
        $student=Student::find(session("auth")->id);
        $student->email_verified_at=now();
        $student->update();
        session(["auth"=>$student]);

        return redirect()->route("dashboard.home");
    }
}

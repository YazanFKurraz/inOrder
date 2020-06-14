<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('front-end.users.login');
    }

    public function store(Request $request)
    {
       // Validate the user
       $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Log the user In
    $credentials = $request->only('email','password');

    if (! Auth()->attempt($credentials)) {
        return back()->withErrors([
            'message' => 'Wrong Email or Password, Please try again'
        ]);
    }
    return redirect()->route('landing.index');
}


public function logout()
    {
        auth()->logout();
        return redirect('user/login')->with('success','You have been logged out');
      }

}

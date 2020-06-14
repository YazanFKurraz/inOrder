<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

	 public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


     public function login()
    {
		return view('back-end.login');
    }


    public function store(Request $request)
    {
    	// dd($request->all());
    	$request->validate([
    		'email' => 'required|email',
    		'password' => 'required',
    	]);	

    	$credentials = $request->only('email','password');

    	if (!Auth::guard('admin')->attempt($credentials)) {
    		
    		return back()->withErrors([
    			'message'=> 'Wrong Email or Password , Please try again'
    		]);
    	}
    	return redirect('/admin/home');
    }


    public function logout() {
        auth()->guard('admin')->logout();
      return redirect('admin/login')->with('success','You have been logged out');
    }
}

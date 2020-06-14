<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('front-end.users.register');
    }


    public function store(Request $request)
    
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',  
            'email' => 'required|email',  
            'password' => ['required', 'string', 'min:6', 'confirmed'],  
        ]);

 
            $user = User::create([
            'name' => $request->name,    
            'email' => $request->email,    
            'password' => bcrypt($request->password),    
            ]);

            auth()->login($user);
          
            alert()->success('Account Added Successfully','Done');
         
            return redirect()->route('landing.index');           
        }
}

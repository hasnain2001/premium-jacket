<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    

        if (Auth::attempt($request->only('email', 'password'))) {
         
            if (auth()->user()->is_admin) {
            
                return redirect()->route('admin.home');
            } else {
         
                Auth::logout();
                return back()->withErrors(['email' => 'Unauthorized access']);
            }
        }
    

        return back()->withErrors(['email' => 'Wrong credentials']);
    }
    
}

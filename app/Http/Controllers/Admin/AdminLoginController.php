<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function adminLogin(LoginRequest $request){
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with(['success' => 'Email And Password Donot Match!']);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ]) || Auth::attempt(['email' => 'admin@gmail.com', 'password' => $request->password ])) {
            return redirect()->route('dashboard');
        } else {
            return back()->with(['success' => 'Something Went Wrong. Please try again!']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
            Session::flush();
            return redirect()->route('login');
    }
}

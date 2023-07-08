<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        return view('pages.login');
    }

    public function register(){
        return view('pages.register');
    }

    public function authLogin(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // jika role penghuni maka ke home dan jika pemilik atau admin ke dashboard
            if(Auth::user()->role == "penghuni"){
                return redirect('/');
            }else{
                return redirect()->intended('dashboard');
            }
        }

        return back()->with('loginError', 'Email atau Password salah');
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}

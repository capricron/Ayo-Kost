<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Email atau Password salah');
    }

    public function makeAccount(Request $request, User $user){

        $seed = rand(10,100);

        $profile = "https://api.dicebear.com/6.x/avataaars/png?seed=$seed&backgroundColor=b6e3f4,c0aede,d1d4f9,ffdfbf,ffd5dc&backgroundType=gradientLinear&accessoriesProbability=25";

        // create akun
        $user->create([
            'name' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'profile' => $profile,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat');
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}

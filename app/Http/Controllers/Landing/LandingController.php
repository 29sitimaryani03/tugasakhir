<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    function index(){
        return view('landing.home');
    }
    function login(){
        return view('landing.login');
    }
    function aksiLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('konsumen')->attempt($credentials)) {
            return redirect('konsumen/dashboard')->with('success', 'Selamat datang konsumen !');
        }else{
            return back('/login')->with('danger', 'Login gagal periksa email atau password anda !');
        }
    }
    function registrasi(){
        return view('landing.registrasi');
    }


}

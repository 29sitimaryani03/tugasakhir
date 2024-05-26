<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Logo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        $logo = Logo::first();
        return view('auth.login', compact('logo'));
    }

    function showRegis()
    {
        $logo = Logo::first();
        return view('auth.regis', compact('logo'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|regex:/^[A-Za-z\s]*$/',
            'username' => 'required',
            'email' => 'required|email|min:5|max:60',
            'no_hp' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ], [
            'nama.regex' => 'Nama lengkap tidak boleh menggunakan angka!',
            'nama.required' => 'Nama Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Harus Email Yang Valid',
            'no_hp.required' => 'Nomor HP Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'confirm_password.same' => 'Konfirmasi password tidak sama!'
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->nama = request('nama');
        $user->email = request('email');
        $user->username = request('username');
        $user->type = 'USER';
        $user->no_hp = request('no_hp');
        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect('login')->with('success', 'Daftar Berhasil');
    }

    public function loginProcess()
    {
        $credential = [
            'email' => request('email'),
            'password' => request('password')
        ];

        if (auth()->attempt($credential)) {
            $user = auth()->user();
            if ($user->type == 'ADMIN') {
                return redirect('admin/dashboard')->with('success', 'Login Berhasil');
            } else {
                return redirect('home')->with('success', 'Login Berhasil');
            }
        } else {
            return back()->with('danger', 'Login Gagal, Silahkan Cek Email dan Password');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout()
    {
        auth()->logout();

        return redirect('home');
    }
}

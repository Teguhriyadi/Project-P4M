<?php

namespace App\Http\Controllers;

use App\Models\Model\TerakhirLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view("/admin/auth/login");
    }

    public function post_login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            TerakhirLogin::create([
                "nama" => auth()->user()->name,
            ]);

            return redirect()->intended('/page/admin/dashboard')->with("success", "Anda Berhasil Login");
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
    {

        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect("/page/login");
    }
}

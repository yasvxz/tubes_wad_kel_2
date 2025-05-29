<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username_sso' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('username_sso', $request->username_sso)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            $isAdmin = Admin::where('user_id', $user->user_id)->exists();
            session(['role' => $isAdmin ? 'admin' : 'user']);

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['username_sso' => 'Email atau password salah.'])->withInput();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}

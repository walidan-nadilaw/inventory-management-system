<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login'); 
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = User::where('username', $request->username)->first();
        if ($user && password_verify($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('dashboard'); 
        }
        return back()->withErrors(['login' => 'Username atau password salah']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
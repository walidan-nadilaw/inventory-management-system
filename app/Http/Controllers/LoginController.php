<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Jika tetap ingin menggunakan session guard Laravel
use App\Models\User;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            return redirect()->intended('/inventory')->with('login', "Selamat datang {$user->name}");
        }

        // Login gagal
        return back()->withErrors([
            'login' => 'Username atau password yang Anda masukkan salah.',
        ])->withInput($request->only('username')); // Kembali ke form dengan input username
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login.form')->with('logout', 'Anda telah berhasil logout.');
    }
}
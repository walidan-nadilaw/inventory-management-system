<?php
namespace App\Http\Controllers;
// Contoh di dalam Controller
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Jika tetap ingin menggunakan session guard Laravel
// atau
use Illuminate\Support\Facades\Session; // Untuk manajemen session manual sederhana

class LoginController extends Controller
{
    // Kredensial yang "ditanam"
    private $hardcodedUsername = 'admin'; // Ganti dengan username Anda
    private $hardcodedPassword = 'admin123'; // GANTI DENGAN PASSWORD KUAT!

    public function showLoginForm()
    {
        return view('auth.login_single');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === $this->hardcodedUsername && $password === $this->hardcodedPassword) {
            // Login berhasil
            // Anda bisa set session di sini untuk menandakan user sudah login
            $request->session()->put('user_logged_in', true);
            $request->session()->put('username', $username); // Simpan username jika perlu

            // Redirect ke halaman dashboard atau halaman utama setelah login
            return redirect()->intended('/'); // Ganti dengan route tujuan
        }

        // Login gagal
        return back()->withErrors([
            'login' => 'Username atau password yang Anda masukkan salah.',
        ])->withInput($request->only('username')); // Kembali ke form dengan input username
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_logged_in');
        $request->session()->forget('username');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form')->with('status', 'Anda telah berhasil logout.');
    }
}
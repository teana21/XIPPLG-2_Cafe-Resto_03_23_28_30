<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class AdminAuthController extends Controller
{

  // function untuk menampilkan halaman login
  public function index()
  {
    if (Auth::user()) {
      return redirect()->route('admin.dashboard');
    }
    // Jika belum login, tampilkan halaman login admin
    return view('admin.auth.login');
  }


  public function login(Request $request)
  {
    // Validasi input login
    $request->validate([
      'email' => 'required|email', // Email harus diisi dan berformat email
      'password' => 'required',   // Password harus diisi
    ]);

    // Ambil data pengguna berdasarkan email
    $user = User::where('email', $request->email)->first();

    if ($user) {
      // Coba login dengan email dan password
      if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate(); // Regenerasi sesi untuk keamanan

        // Periksa pengguna
        if ($user->role === 'seller') {
          return redirect()->route('admin.dashboard'); // Arahkan ke halaman admin
        }

        // Jika berhasil login dan bukan seller maka akan di arahkan ke home
        return redirect()->route('home');
      } else {
        // Jika password salah, kembalikan ke halaman login dengan pesan error
        return redirect()
          ->back()
          ->withErrors(['password' => 'Incorrect password.'])
          ->withInput();
      }
    } else {
      // Jika email tidak terdaftar, kembalikan ke halaman login dengan pesan error
      return redirect()
        ->back()
        ->withErrors(['email' => 'Email not registered.'])
        ->withInput();
    }
  }

  // Method untuk menangani logout
  public function logout(Request $request)
  {
    Auth::logout();                        // Logout pengguna
    $request->session()->invalidate();     // Hapus sesi
    $request->session()->regenerateToken(); // Regenerasi token sesi

    // arahkan ke halaman login
    return redirect()->route('admin.login');
  }
}

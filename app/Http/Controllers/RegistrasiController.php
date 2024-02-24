<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan Anda mengimpor model User jika menggunakan model User untuk penyimpanan data pengguna

class RegistrasiController extends Controller
{
    public function showRegistrationForm()
    {
        return view('regis.registrasi'); // Mengembalikan view untuk halaman registrasi
    }

    public function register(Request $request)
    {
        // Validasi data yang diterima dari form registrasi
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru berdasarkan data yang diterima dari form
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect ke halaman setelah registrasi berhasil
        return redirect()->route('/')->with('success', 'Akun Anda berhasil dibuat. Silakan masuk.');
    }
}

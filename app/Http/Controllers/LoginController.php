<?php

namespace App\Http\Controllers;

use App\Models\ModelBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanlogin(){
         return view('regis.login');

    }

    public function postlogin(Request $request){
        // Validasi reCAPTCHA
        $request->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);
    
        // Auth::attempt untuk mencoba login
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }
        
        // Jika login gagal karena email atau password salah
        return redirect('/login')->with('error', 'Email atau password yang Anda masukkan salah.');
    }
    

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function halamanregistrasi(){
        return view('regis.registrasi');

    }
}

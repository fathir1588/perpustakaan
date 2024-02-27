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
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }
        return redirect('/home');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function halamanregistrasi(){
        return view('regis.registrasi');

    }
}

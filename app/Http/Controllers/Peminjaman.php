<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Peminjaman extends Controller
{
   public function index(){

        return view('/Peminjam.data_peminjam');
   }
}

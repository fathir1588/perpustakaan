<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman; // Pastikan menyesuaikan namespace dengan model Anda
use App\Models\ModelBuku;

class LaporanBukuController extends Controller
{
    public function index()
    {
        $data = ModelBuku::all(); // Ambil data dari model Peminjaman atau model yang sesuai dengan struktur aplikasi Anda
        return view('Peminjam.pdf_peminjaman', compact('data'));
    }
    
}

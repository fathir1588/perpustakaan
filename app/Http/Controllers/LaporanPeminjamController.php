<?php

namespace App\Http\Controllers;

use PDF;   
use Dompdf\Dompdf;
use App\Models\ModelBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman; // Pastikan menyesuaikan namespace dengan model Anda


class LaporanPeminjamController extends Controller
{
    public function index()
    {
        $data = Peminjaman::all(); // Ambil data dari model Peminjaman atau model yang sesuai dengan struktur aplikasi Anda
        return view('Peminjam.pdf_peminjaman', compact('data'));
    }
    
    //Buku
    public function downloadPeminjamPDF(Request $request)
    {
        // Mengambil ID pengguna yang sedang login
        $userId = Auth::id();
    
        // Mengambil data peminjaman yang dimiliki oleh pengguna yang sedang login
        $data = Peminjaman::where('user_id', $userId)->get();
    
        // Membuat PDF dari data yang diperoleh
        $pdf = PDF::loadView('Peminjam.pdf_peminjaman', compact('data'));
    
        // Mengembalikan PDF sebagai stream
        return $pdf->stream('data_peminjaman.pdf');
    }

}


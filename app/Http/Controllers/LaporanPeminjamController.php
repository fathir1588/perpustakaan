<?php

namespace App\Http\Controllers;

use PDF;   
use Illuminate\Http\Request;
use App\Models\Peminjaman; // Pastikan menyesuaikan namespace dengan model Anda
use App\Models\ModelBuku;
use Dompdf\Dompdf;


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
        $data = Peminjaman::all(); // Gantilah dengan logika pengambilan data yang sesuai
        $pdf = PDF::loadView('Peminjam.pdf_peminjaman', compact('data')); // Gantilah dengan nama view dan variabel yang sesuai

        // Langsung mencetak PDF
        return $pdf->stream('data_buku.pdf');
    }

}


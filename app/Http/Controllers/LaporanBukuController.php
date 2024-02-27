<?php

namespace App\Http\Controllers;

use PDF;   
use Illuminate\Http\Request;
use App\Models\Peminjaman; // Pastikan menyesuaikan namespace dengan model Anda
use App\Models\ModelBuku;
use Dompdf\Dompdf;


class LaporanBukuController extends Controller
{
    public function index()
    {
        $data = ModelBuku::all(); // Ambil data dari model Peminjaman atau model yang sesuai dengan struktur aplikasi Anda
        return view('katalogbuku.pdf_buku', compact('data'));
    }
    
    //Buku
    public function downloadBukuPDF(Request $request)
    {
        $data = ModelBuku::all(); // Gantilah dengan logika pengambilan data yang sesuai
        $pdf = PDF::loadView('katalogbuku.pdf_buku', compact('data')); // Gantilah dengan nama view dan variabel yang sesuai

        // Langsung mencetak PDF
        return $pdf->stream('data_buku.pdf');
    }

}

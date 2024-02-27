<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use App\Models\ModelBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    
    public function index()
{
    // Mengambil ID pengguna yang sedang login
    $userId = auth()->id();

    // Mengambil data peminjaman yang dimiliki oleh pengguna yang sedang login
    $peminjamans = Peminjaman::where('user_id', $userId)->get();

    // Mengambil semua data buku
    $buku = ModelBuku::all();

    // Mengirim data peminjaman dan data buku ke view
    return view('peminjam.data_peminjam', compact('peminjamans', 'buku'));
}


    public function store(Request $request)
{
    // Validasi data yang diterima dari formulir
    $request->validate([
        'buku_id' => 'required',
        'tanggal_peminjaman' => 'required|date',
        'jumlahPinjaman' => 'required|integer|min:1',
    ]);

    // Ambil informasi buku yang akan dipinjam
    $buku = ModelBuku::findOrFail($request->buku_id);

    // Pastikan stok buku mencukupi
    if ($buku->stok >= $request->jumlahPinjaman){
        // Buat entri peminjaman baru
        $peminjaman = Peminjaman::create([
            'user_id' => Auth::id(), // Gunakan ID pengguna yang sedang login
            'buku_id' => $request->buku_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'jumlahPinjaman' => $request->jumlahPinjaman,
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        // Kurangi stok buku
        $buku->stok -= $request->jumlahPinjaman;
        $buku->save();

        // Redirect ke halaman terkait dengan pesan sukses
        return redirect()->back()->with('success', 'Buku berhasil dipinjam.');
    } else {
        // Redirect dengan pesan kesalahan jika stok tidak mencukupi
        return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
    }
}


    // public function returnBook($id)
    // {
    //     $peminjaman = Peminjaman::findOrFail($id);
    
    //     // Ubah status peminjam berdasarkan nilai enum yang diizinkan
    //     if ($peminjaman->status_peminjam == 'belum dikembalikan') {
    //         $peminjaman->status_peminjam = 'sudah dikembalikan';
    //     } else {
    //         $peminjaman->status_peminjam = 'belum dikembalikan';
    //     }
    //     $peminjaman->tanggal_pengembalian = Carbon::now();
    //     // Simpan perubahan status peminjam
    //     $peminjaman->save();
    
    //     // Redirect ke halaman terkait dengan pesan sukses
    //     return redirect()->back()->with('success', 'Status berhasil diubah.');
    // }
    public function returnBook($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Pastikan bahwa peminjaman yang akan dikembalikan milik pengguna yang sedang login
        if ($peminjaman->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengembalikan peminjaman ini.');
        }

        // Ubah status peminjam berdasarkan nilai enum yang diizinkan
        if ($peminjaman->status_peminjam == 'belum dikembalikan') {
            $peminjaman->status_peminjam = 'sudah dikembalikan';
        } else {
            $peminjaman->status_peminjam = 'belum dikembalikan';
        }
        $peminjaman->tanggal_pengembalian = Carbon::now();
        // Simpan perubahan status peminjam
        $peminjaman->save();

        // Redirect ke halaman terkait dengan pesan sukses
        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }

    public function pdfBuku()
{
    
$pdf = app('dompdf.wrapper');
        $pdf->loadView('petugas.pdf_view', ['data' => $data->toArray()]);

        $filename = 'Data Buku ' . date('d-m') . '.pdf';

        return $pdf->stream($filename);
}
    
}    



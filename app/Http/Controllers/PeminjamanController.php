<?php

namespace App\Http\Controllers;

use App\Models\ModelBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::all();
        $buku = ModelBuku::all();
        return view('peminjam.data_peminjam', compact('peminjamans', 'buku'));
    }
}

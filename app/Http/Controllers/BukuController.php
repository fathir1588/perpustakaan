<?php

namespace App\Http\Controllers;

use App\Models\ModelBuku; // Mengimpor model ModelBuku
use Illuminate\Http\Request; // Import Request dari namespace yang benar

class BukuController extends Controller
{
    public function index()
    {
        $data_buku = ModelBuku::all();   
        return view('katalogbuku.buku_data' , compact ('data_buku'));
    }

    public function buku_input()
    {
        return view('katalogbuku.buku_input');
    }

    public function insertdata(Request $request)
    {
        ModelBuku::create($request->all());
        return redirect()->route('buku')->with('success','Data Berhasil Ditambahkan');
    }

    public function tampilkandata($id){
        
        $data_buku =  ModelBuku::find($id);
        return view('katalogbuku.buku_tampil',compact('data_buku'));
    }
    
    public function updatedata(Request $request, $id){
        $data_buku = ModelBuku::find($id);
        $data_buku->update($request->all());
        return redirect()->route('buku')->with('success','Data Berhasil Di Update');
    }
    
    public function delete($id) {
        ModelBuku::destroy($id);
        return redirect()->route('buku')->with('success', 'Data berhasil dihapus');
    }
    
    

}
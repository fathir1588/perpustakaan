<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LaporanBukuController;
use App\Http\Controllers\LaporanPeminjamController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegistrasiController::class, 'showRegistrationForm'])->name('register');
Route::post('/registerr', [RegistrasiController::class, 'register'])->name('registerr');


Route::group(['middleware' => ['role:admin|petugas']], function () {
    Route::get('/bukuinput', [BukuController::class, 'buku_input'])->name('buku_input');
    Route::post('/insertdata', [BukuController::class, 'insertdata'])->name('insertdata');
    Route::get('/tampilkandata/{id}', [BukuController::class, 'tampilkandata'])->name('tampilkandata');
    Route::put('/editbuku/{id}', [BukuController::class, 'updatedata'])->name('editbuku');
    Route::post('/updatedata/{id}', [BukuController::class, 'updatedata'])->name('updatedata');
    Route::get('/delete/{id}', [BukuController::class, 'delete'])->name('delete');
});

Route::group(['middleware' => ['role:admin|petugas|peminjam']], function () {
    Route::get('/buku', [BukuController::class, 'index'])->name('buku');
    Route::get('/home', [BukuController::class, 'home'])->name('total_buku');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('index');
    Route::post('/peminjaman' ,[PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::put('/peminjaman/{id}', [PeminjamanController::class, 'returnBook'])->name('peminjaman.return');
    Route::get('/laporan-peminjam' ,[LaporanPeminjamController::class, 'downloadPeminjamPDF'])->name('laporan_peminjam');
    Route::get('/laporan-buku' ,[LaporanBukuController::class, 'downloadBukuPDF'])->name('laporan_buku');
});















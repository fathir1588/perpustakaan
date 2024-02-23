<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\peminjaman;

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

Route::get('/', function () {
    return view('welcome.welcome');
});


Route::get('/home', function () {
    return view('layout.main');
});

Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/buku', [BukuController::class, 'index'])->name('buku');
Route::get('/bukuinput', [BukuController::class, 'buku_input'])->name('buku_input');
Route::post('/insertdata', [BukuController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}', [BukuController::class, 'tampilkandata'])->name('tampilkandata');
Route::put('/editbuku/{id}', [BukuController::class, 'updatedata'])->name('editbuku');
Route::post('/updatedata/{id}', [BukuController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{id}', [BukuController::class, 'delete'])->name('delete');

Route::get('/peminjaman', [Peminjaman::class, 'index'])->name('index');









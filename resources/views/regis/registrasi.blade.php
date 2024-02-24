<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a href="{{ route('register') }}"><b>Registrasi</b></a> <!-- Mengubah tautan ke halaman registrasi -->
</div>

<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">Silakan Daftar</p> <!-- Mengubah pesan ke pesan daftar -->
<form action="{{ route('register.submit') }}" method="post"> <!-- Menghubungkan dengan controller menggunakan route 'register.submit' -->
    @csrf
<div class="input-group mb-3">
<input type="text" class="form-control" name="name" placeholder="Nama"> <!-- Menambahkan input untuk nama -->
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span> <!-- Menggunakan ikon pengguna untuk nama -->
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="email" class="form-control" name="email" placeholder="Email">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" name="password" placeholder="Password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password"> <!-- Menambahkan input untuk konfirmasi password -->
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<button type="submit" class="btn btn-primary btn-block">Daftar</button> <!-- Mengubah teks tombol ke "Daftar" -->
</div>
</div>
</form>
</div>
</div>
@include('layout.script')
</body>
</html>

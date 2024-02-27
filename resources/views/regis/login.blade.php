<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <!-- Tambahkan script reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="login-logo">
            <a href="{{ route('postlogin') }}"><b>Perpus</b>Digital</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukkan Akun Anda</p>
                <form action="{{ route('postlogin') }}" method="post">
                    @csrf
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
                    <!-- Tambahkan widget reCAPTCHA -->
                    <div class="g-recaptcha" data-sitekey="6LexVIEpAAAAAJWoK_-PhuHeOP1ET1WT-AU-Dy7d"></div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
                <!-- Tombol Registrasi -->
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.script')
</body>
</html>

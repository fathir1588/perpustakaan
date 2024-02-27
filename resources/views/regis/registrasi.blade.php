
<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('postlogin') }}"><b>Perpus</b>Digital</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukkan Akun Anda</p>
                <form method="POST" action="{{ route('registerr') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="username" name="username" required autofocus
                            placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" required autofocus
                            placeholder="email">
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
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                    </div>
                </form>

                <!-- Tombol Registrasi -->
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p><a href="{{ route('login') }}">Sudah Punya Akun?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.script')
</body>
</html>
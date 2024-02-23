<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/AdminLTE') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/AdminLTE') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/summernote/summernote-bs4.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        {{-- Open Navbar Dashboard --}}
        @include('komponen.navbar')
        {{-- Close Navbar Dashboard --}}

        {{-- Open Sidebar Dashboard --}}
        @include('komponen.sidebar')
        {{-- Close Sidebar Dashboard --}}

        {{-- Open Konten Dashboard --}}
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tambahkan Data</h1>
                        </div>
                    </div>
                </div>
            </div>
            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                @csrf
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">JUDUL</th>
                            <th scope="col">PENULIS</th>
                            <th scope="col">PENERBIT</th>
                            <th scope="col">TAHUN TERBIT</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="judul" placeholder="MASUKAN JUDUL BUKU" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="penulis" placeholder="MASUKAN PENULIS BUKU" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="penerbit" placeholder="MASUKAN PENERBIT" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="tahun_terbit" placeholder="MASUKAN TAHUN TERBIT" required>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    </div>
                </div>
            </section>
        </div>

        {{-- Close Konten Dashboard --}}
        <footer class="main-footer">

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('assets/AdminLTE') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('assets/AdminLTE') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/AdminLTE') }}/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/AdminLTE') }}/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/AdminLTE') }}/dist/js/pages/dashboard.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE') }}/plugins/summernote/summernote-bs4.min.css">
</head>
<body>
    <div class="wrapper">
        {{-- Navbar --}}
        @include('komponen.navbar')
        {{-- End Navbar --}}
        
        {{-- Sidebar --}}
        @include('komponen.sidebar')
        {{-- End Sidebar --}}
        
        {{-- Content --}}
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1>Daftar Peminjaman</h1>
                            <table border="1">
                                <thead>
                                    <tr>
                                        <th>ID Peminjaman</th>
                                        <th>ID Anggota</th>
                                        <th>ID Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($peminjamans as $p)
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->user_id }}</td>
                                        <td>{{ $p->buku_id }}</td>
                                        <td>{{ $p->tanggal_peminjaman }}</td>
                                        <td>{{ $p->tanggal_pengembalian }}</td>
                                        <td>{{ $p->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($peminjamans->isEmpty())
                            <table border="1">
                                <tbody>
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ada...</td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Content --}}

        {{-- Footer --}}
        <footer class="main-footer"></footer>
        {{-- End Footer --}}

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark"></aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/AdminLTE') }}/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete').click(function() {
            var bukuid = $(this).attr('data-id');
            var datajudul = $(this).attr('data-judul');
            Swal.fire({
                title: "Yakin?",
                text: "Kamu Akan Menghapus Data Buku Dengan Judul " + datajudul + " ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete/" + bukuid + "";
                    Swal.fire({
                        title: "Dihapus!",
                        text: "Data Buku Telah Dihapus.",
                        icon: "success"
                    });
                }
            });
        });
    </script>
</body>
</html>

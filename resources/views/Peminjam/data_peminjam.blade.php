

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
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <h1 class="m-0">PEMINJAMAN</h1>
                        </div>
                        
                        <div class="col-sm-6 text-right"> <!-- Mengatur tata letak elemen di sebelah kanan -->
                            <a class="btn btn-primary" data-toggle="modal" data-target="#modal-detailpinjam">Pinjam Buku</a>
                            <a href="{{ route('laporan_peminjam') }}" class="btn btn-success">Cetak Laporan</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        
            <div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
            
                @if ($error = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endif
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">NO</th>
                        <th scope="col" class="text-center">PEMINJAM</th>
                        <th scope="col" class="text-center">BUKU</th>
                        <th scope="col" class="text-center">Jumlah</th>
                        <th scope="col" class="text-center">TANGGAL PEMINJAMAN</th>
                        <th scope="col" class="text-center">Tanggal Pengembalian</th>
                        <th scope="col" class="text-center">Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if(count($peminjamans) > 0)
                    <?php $no=1; ?>
                    @foreach($peminjamans as $p)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $p->user->username }}</td>
                        <td class="text-center">{{ $p->buku->judul }}</td>
                        <td class="text-center">{{ $p->jumlahPinjaman }}</td>
                        <td class="text-center">{{ $p->tanggal_peminjaman}}</td>
                        <td class="text-center">{{ $p->tanggal_pengembalian}}</td>
                        <td class="text-center">
                            <form action="{{ route('peminjaman.return', $p->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="status-btn btn btn-sm 
                                    @if($p->status_peminjam == 'sudah dikembalikan') btn-success @else btn-danger @endif">
                                    <i class="fas fa-{{ $p->status_peminjam == 'sudah dikembalikan' ? 'check' : 'times' }}"></i>
                                    {{ ucfirst($p->status_peminjam) }}
                                </button>
                            </form>
                            
                        </td>

                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">Data tidak ada...</td>
                    </tr>
                    @endif              
                </tbody>
            </table>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    </div>
                </div>
            </section>
        </div>


        @foreach ($buku as $item)
    <!-- Modal Detail Peminjaman -->
    <div class="modal fade" id="modal-detailpinjam">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Detail Buku</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
    
                <div class="modal-body">
                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="form-group">
                            <label for="buku_id">Pilih Buku:</label>
                            <select name="buku_id" id="buku_id" class="form-control" required>
                                @foreach($buku as $item)
                                <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
                            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlahPinjaman">Jumlah Pinjaman:</label>
                            <input type="number" name="jumlahPinjaman" id="jumlahPinjaman" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Pinjam Buku</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @endforeach


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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
</body>
<script>
    $('.pengembalian').click(function() {
        var button = $(this); // Simpan referensi tombol pengembalian yang diklik
        var peminjamanId = button.attr('data-id');
        var judulBuku = button.attr('data-judul');

        Swal.fire({
            title: 'Konfirmasi Pengembalian Buku',
            text: 'Apakah Anda yakin ingin mengembalikan buku ' + judulBuku + '?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Saya Yakin',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Menggunakan AJAX untuk mengirim permintaan POST
                $.ajax({
                    url: '/peminjaman/' + peminjamanId + '/return',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}' // Menyertakan token CSRF langsung di sini
                    },
                    success: function(response) {
                        // Tindakan setelah pengembalian berhasil
                        Swal.fire('Berhasil!', 'Buku berhasil dikembalikan.', 'success');
                        // Sembunyikan tombol pengembalian yang telah diklik
                        button.hide();
                    },
                    error: function(xhr, status, error) {
                        // Tindakan jika terjadi kesalahan
                        Swal.fire('Error!', 'Terjadi kesalahan saat mengembalikan buku.', 'error');
                    }
                });
            }
        });
    });



    
$('.delete').click( function(){

    var bukuid = $(this).attr('data-id')
    var  datajudul = $(this).attr('data-judul')

    Swal.fire({
  title: "Yakin?",
  text: "Kamu Akan Menghapus Data Buku Dengan Judul "+datajudul+" ",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Iya, Hapus!"
}).then((result) => {
  if (result.isConfirmed) {
    window.location = "/delete/"+bukuid+""
    Swal.fire({
      title: "Dihapus!",
      text: "Data Buku Telah Dihapus.",
      icon: "success"
    });
  }
});

});


    
</script>
</html>


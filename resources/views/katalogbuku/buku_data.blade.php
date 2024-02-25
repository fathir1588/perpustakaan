

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
                            <h1 class="m-0">DATA BUKU</h1>
                        </div>
                        <div class="col-sm-6 text-right"> <!-- Mengatur tata letak elemen di sebelah kanan -->
                            <a class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">Tambah Buku</a>
                        </div>
                    </div>
                </div>
            </div>
        
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif
        
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ID BUKU</th>
                        <th scope="col" class="text-center">JUDUL</th>
                        <th scope="col" class="text-center">PENULIS</th>
                        <th scope="col" class="text-center">PENERBIT</th>
                        <th scope="col" class="text-center">TAHUN TERBIT</th>
                        <th scope="col" class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($data_buku) > 0)
                    <?php $no=1; ?>
                    @foreach($data_buku as $v)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $v->judul }}</td>
                        <td class="text-center">{{ $v->penulis }}</td>
                        <td class="text-center">{{ $v->penerbit }}</td>
                        <td class="text-center">{{ $v->tahun_terbit }}</td>
                        <td class="text-center">
        
                            {{-- <a href="/tampilkandata/{{ $v->id }}" class="btn btn-info">Edit</a> --}}
                            <a href="#" class="btn btn-warning btn-sm editBtn" data-toggle="modal" data-target="#modal-editadmin-{{ $v->id }}" data-id="{{ $v->id }}">
                              <i class="fas fa-edit"></i>
                          </a>
                            <a href="#" class="btn btn-danger delete btn-sm" data-id ="{{ $v->id }}" data-judul ="{{ $v->judul }}"><i class="fas fa-trash"></i></a>
                                
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


<div class="modal" id="tambahDataModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
              <label for="judul" class="form-label">Judul Buku</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul buku" required>
            </div>
            <div class="mb-3">
              <label for="penulis" class="form-label">Penulis Buku</label>
              <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan nama penulis" required>
            </div>
            <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit" required>
            </div>
            <div class="mb-3">
              <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
              <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan tahun terbit" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  @foreach ($data_buku as $item)
  <!-- Modal Edit -->
  <div class="modal fade" id="modal-editadmin-{{ $item->id }}">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title font-weight-bold">Edit buku</h4>
              </div>

              <!-- Formulir Edit -->
              <div class="modal-body">
                  <form action="{{ route('editbuku', ['id' => $item->id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="card-body">
                          <div class="form-group">
                              <label for="name">Judul</label>
                              <input type="text" class="form-control" id="judul" name="judul" value="{{ $item->judul }}" placeholder="Masukkan Nama" autofocus>
                          </div>
                          <div class="form-group">
                              <label for="namalengkap">Penulis</label>
                              <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $item->penulis }}" placeholder="Masukkan Nama Lengkap" required>
                          </div>
                          <div class="form-group">
                              <label for="email">Penerbit</label>
                              <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $item->penerbit }}" placeholder="contoh@gmail.com" required>
                          </div>
                          <div class="form-group">
                              <label for="alamat">Tahun Terbit</label>
                              <input type="text" class="form-control" name="tahun_terbit" value="{{ $item->tahun_terbit }}" required>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default font-weight-bold" data-dismiss="modal">BATAL</button>
                          <button type="submit" class="btn btn-primary font-weight-bold">SIMPAN</button>
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


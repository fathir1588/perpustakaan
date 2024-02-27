<!DOCTYPE html>
<html lang="en">
<head>
    <title>LAPORAN BUKU</title>
    <style>
        /* Gaya CSS */
        body {
            /* font-family: 'Calibri', Arial, sans-serif;  */
            line-height: 1.6;
            color: #333;
        }

        .report-container {
            width: 100%;
            max-width: 800px; /* Sesuaikan kebutuhan */
            margin: 0 auto; /* Agar konten berada di tengah */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table tr td {
            font-size: 12pt;
            padding: 10px;
        }

        table tr .text {
            text-align: right;
            font-size: 12pt;
            padding: 1;
            margin-top: -14px;
        }

        .logo {
            text-align: center;
            margin-top: 70px;
        }

        .logo img {
            width: 70px;
            height: 70px;
            margin-top: 70px; 
        }

        .title {
            font-size: 13pt;
            margin-bottom: 1;
        }

        .subtitle {
            font-size: 18pt;
            margin-bottom: 1px;
        }

        .description {
            font-size: 12pt;
            font-style: italic;
            margin-bottom: 10px;
        }

        .fancy-line {
            border: none;
            height: 1mm;
            background-image: linear-gradient(to right, #ccc, #333, #ccc);
        }

        table {
            margin-top: -5px;
        }
    </style>
</head>
<body>
    <!-- Konten laporan -->
    <div class="report-container">
        <!-- Header laporan -->
        <table>
            <tr>
                <td>
                    <center>
                        <font size="4">LAPORAN BUKU</font><br>
                        <font size="5"><b>SMKN 4 PAYAKUMBUH</b></font><br>
                        <font size="2">Lembaga Perpustakaan Smkn 4 Payakumbuh</font><br>
                        <font size="2"><i>Jl. Koto Kociak, Kel.Padang Sikabu, Kec. Lamposi Tigo Nagori, Padang Sikabu, Kec. Lamposi Tigo Nagori, Kota Payakumbuh, Sumatera Barat 26219</i></font> 
                    </center>
                </td>
            </tr>
        </table>

        <!-- Tabel data buku -->
        <table border="2" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($data as $peminjaman)
                    <tr style="text-align: center;">
                        <td>{{ $no++ }}</td>
                        <td>{{ $peminjaman->judul }}</td>
                        <td>{{ $peminjaman->penulis }}</td>
                        <td>{{ $peminjaman->penerbit }}</td>
                        <td>{{ $peminjaman->tahun_terbit }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tanda tangan kepala perpustakaan -->
        <table width="100%">
            <tr>
                <td width="100%"></td>
                <td class="text2"  align="center" style="text-align: center">KEPALA PERPUSTAKAAN  <br><br><br><br>Ranti Erminasari</td>
            </tr>
        </table>
    </div>

    <!-- Tombol cetak laporan -->
    <button onclick="cetakLaporan()" style="margin: 20px auto; display: block;">Cetak Laporan</button>

    <!-- Skrip JavaScript untuk cetak laporan -->
    <script>
    
    function cetakLaporan() {
        window.print(); // Fungsi untuk mencetak halaman
    }
    </script>
</body>
</html>

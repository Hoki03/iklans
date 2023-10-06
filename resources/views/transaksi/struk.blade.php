<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iklan | Struk</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
</head>

<body>
    <!-- <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> Iklan
                        <small class="float-right">Date: 2/10/2014</small>
                    </h2>
                </div>
            </div> -->
    <!-- info row -->
    <div class="row invoice-info mb-5">
        <div class="col-sm-2 invoice-col">
            <img src="{{ asset('image/Lambang_Kota_Salatiga.png') }}" style="width: 190px; height: 230px;">
        </div>
        <!-- /.col -->
        <div class="col-sm-8 invoice-col">
            <center>
                <h2>DINAS KOMUNIKASI DAN INFORMATIKA</h2><br>
                <h1><b><u>KOTA SALATIGA</u></b></h1><br>
                Jl. Letjend Sukowati No. 51 Salatiga, Jawa Tengah 50724<br>
                Telp. :(0298) 326767, Fax : (0298) 321398<br>
                Email : diskominfo@salatiga.go.id<br>
                Website : https://diskominfo.salatiga.go.id/
            </center>
        </div>
        <!-- /.col -->
        <div class="col-sm-2 invoice-col">
            <center>
                <h2><b>KUITANSI</b></h2><br>
                <span class="border border-4" style="width: 150px;">
                    <b>No. {{ $index->id }}</b>
                </span>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive mt-5">
            <table class="table table-striped">
                <tr>
                    <td>Telah Terima dari :</td>
                    <td>{{ $index->nama }}</td>
                </tr>
                <tr>
                    <td>Uang Sebanyak :</td>
                    <td><?= nominal($index['nominal']) ?> Rupiah</td>
                </tr>
                <tr>
                    <td>Guna Membayar :</td>
                    <td>{{ $index->keterangan }}</td>
                </tr>
                <tr>
                    <td>Tanggal :</td>
                    <td><?= date('d F Y', strtotime($index['tanggal'])) ?></td>
                </tr>
                <tr>
                    <td>Jenis :</td>
                    <td><?php if ($index['jenis_id'] == 1) {
                        echo 'Radio';
                    } else {
                        echo 'Videotron';
                    }
                    ?></td>
                </tr>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>
    <br>
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-9">
            Terbilang Rp. <?= number_format($index['nominal'], 0, ',', '.') ?>
        </div>
        <!-- /.col -->
        <div class="col-3">
            <p>Salatiga, {{ date('d F Y') }}</p>
            <br>
            <br>
            (................................)
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
    <?php
    
    function nominal($satuan)
    {
        $huruf = ['', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas'];
        if ($satuan < 12) {
            return ' ' . $huruf[$satuan];
        } elseif ($satuan < 20) {
            return nominal($satuan - 10) . 'Belas';
        } elseif ($satuan < 100) {
            return nominal($satuan / 10) . ' Puluh' . nominal($satuan % 10);
        } elseif ($satuan < 200) {
            return ' Seratus' . nominal($satuan - 100);
        } elseif ($satuan < 1000) {
            return nominal($satuan / 100) . ' Ratus' . nominal($satuan % 100);
        } elseif ($satuan < 2000) {
            return ' Seribu' . nominal($satuan - 1000);
        } elseif ($satuan < 1000000) {
            return nominal($satuan / 1000) . ' Ribu' . nominal($satuan % 1000);
        } elseif ($satuan < 1000000000) {
            return nominal($satuan / 1000000) . ' Juta' . nominal($satuan % 1000000);
        } elseif ($satuan <= 1000000000) {
            echo 'Maaf Tidak Dapat di Prose Karena Jumlah Uang Terlalu Besar ';
        }
    }
    
    ?>
</body>

</html>

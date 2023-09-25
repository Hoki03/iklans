@extends('layouts.app')

@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.tambah_transaksi')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama1">Telah Terima dari:</label>
                        <input name="nama" type="nama" class="form-control" id="nama1" placeholder="Masukkan nama">
                        @error('nama')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="uang1">Uang Sebanyak:</label>
                        <input type="nominal" class="form-control" id="uang1" name="nominal" placeholder="Maukkan nominal uang">
                        @error('nominal')
                        <small>*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ket">Guna Membayar:</label>
                        <div class="form-group">
                            <textarea type="keterangan" name="keterangan" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                        <!-- Date and time -->
                        <div class="form-group">
                            <label>Tanggal:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <?php $dt = new DateTime(); ?>
                                <input name="tanggal" <?php echo 'value="' . $dt->format('Y-m-d') . '"' ?> type="text" class="form-control" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('tanggal')
                            <small>*{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pilih</label>
                            <select class="form-control" type="jenis" name="jenis_id">
                                <option value="1">Radio</option>
                                <option value="2">Videotron</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary swalDefaultSuccess">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.card-body -->
</div>
<!-- /.content -->

<!-- /.content-wrapper -->
<footer class="main-footer">
<strong>Copyright &copy; 2023 <a href="#">Iklan</a>.</strong>
All rights reserved.
<!-- <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
</div> -->
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('lte/plugins/chart.js')}}/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('lte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('lte/dist/js/pages/dashboard.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('lte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script>
//Date picker
$('#reservationdate').datetimepicker({
format: 'Y-MM-DD'
});
</script>
@endsection
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
                        <li class="breadcrumb-item active">Transaksi</li>
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
                <form action="create" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama1">Telah Terima dari:</label>
                            <input name="nama" type="nama" class="form-control" id="nama1"
                                placeholder="Masukkan nama">
                            @error('nama')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="uang1">Uang Sebanyak:</label>
                            <input type="nominal" class="form-control" id="uang1" name="nominal"
                                placeholder="Maukkan nominal uang">
                            @error('nominal')
                                <small>*{{ $message }}</small>
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
                                    <input name="tanggal" <?php echo 'value="' . $dt->format('Y-m-d') . '"'; ?> type="text" class="form-control" />
                                    <div class="input-group-append" data-target="#reservationdate"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                @error('tanggal')
                                    <small>*{{ $message }}</small>
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
                        <button type="submit" class="btn swalDefaultSuccess bg-blue-900 text-white hover:bg-blue-700 hover:text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.card-body -->
    </div>
    <!-- /.content -->
@endsection

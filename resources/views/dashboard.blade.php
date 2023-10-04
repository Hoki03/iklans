@extends('layouts.app')

@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h1 class="m-0">Beranda</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Beranda</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jum_transaksi }}</h3>
                            <p>Total Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('transaksi.index') }}" class="small-box-footer">Info lanjut <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $jum_user }}</h3>
                            <p>Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('user.index') }}" class="small-box-footer">Info lanjut <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php $nilai = '0';
                                    foreach ($data_transaksi as $d) : ?>
                            <?php $dt = new DateTime($d['tanggal']); ?>
                            <?php $now = new DateTime(); ?>
                            <?php if ($dt->format('Y-m-d') == $now->format('Y-m-d')) {
                                $nilai = $nilai + 1;
                            } ?>
                            <?php endforeach
                                    ?>
                            <h3><?php echo $nilai; ?></h3>

                            <p>Transaksi Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('transaksi.index') }}" class="small-box-footer">Info lanjut <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php $nilai = '0';
                                    foreach ($data_transaksi as $d) : ?>
                            <?php $dt = new DateTime($d['tanggal']); ?>
                            <?php $now = new DateTime(); ?>
                            <?php if ($dt->format('Y-m') == $now->format('Y-m')) {
                                $nilai = $nilai + 1;
                            } ?>
                            <?php endforeach
                                    ?>
                            <h3><?php echo $nilai; ?></h3>

                            <p>Transaksi Bulan Ini</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('transaksi.index') }}" class="small-box-footer">Info lanjut <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="row">
                <div class="col-md-6">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Transaksi Radio</h3>

                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div> -->
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_transaksi as $d) : ?>
                                        <?php $dt = new DateTime($d['tanggal']); ?>
                                        <?php $now = new DateTime(); ?>
                                        <?php if ($dt->format('Y-m-d') == $now->format('Y-m-d')) { ?>
                                        <tr>
                                            <?php if ($d['jenis_id'] == 1) { ?>
                                            <td><a href="{{ route('transaksi.struk', ['id' => $d->id]) }}" rel="noopener"
                                                    target="_blank"><?= $d['id'] ?></a></td>
                                            <td><?= $d['nama'] ?></td>
                                            <td>
                                                Rp. <?= number_format($d['nominal'], 0, ',', '.') ?>
                                            </td>
                                            <?php } ?>
                                        </tr>

                                        <?php } ?>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Transaksi Videotron</h3>

                            <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_transaksi as $d) : ?>
                                        <?php $dt = new DateTime($d['tanggal']); ?>
                                        <?php $now = new DateTime(); ?>
                                        <?php if ($dt->format('Y-m-d') == $now->format('Y-m-d')) { ?>
                                        <tr>
                                            <?php if ($d['jenis_id'] == 2) { ?>
                                            <td><a href="{{ route('transaksi.struk', ['id' => $d->id]) }}" rel="noopener"
                                                    target="_blank"><?= $d['id'] ?></a></td>
                                            <td><?= $d['nama'] ?></td>
                                            <td>
                                                Rp. <?= number_format($d['nominal'], 0, ',', '.') ?>
                                            </td>
                                            <?php } ?>
                                        </tr>

                                        <?php } ?>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer -->
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>
    </section>
    <!-- /.card-body -->
@endsection

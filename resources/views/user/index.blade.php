@extends('layouts.app')

@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h1 class="m-0">Data User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data User</li>
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
            <div class="row mb-3">
                <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datauser" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($index as $d) : ?>
                                    <tr>
                                        <td><?= $d['id'] ?></td>
                                        <td><?= $d['name'] ?></td>
                                        <td><?= $d['email'] ?></td>
                                        <td><?= $d['level'] ?></td>
                                        <td>
                                            <a href="{{ route('user.edit', ['id' => $d->id]) }}" class="btn btn-primary"><i
                                                    class="fas fa-pen"></i>Edit</a>
                                            <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}"
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah kamu ingin menghapus data ini?
                                                        (<b>{{ $d->name }}</b></b>)</p>
                                                </div>
                                                <div class="modal-footer content-between">
                                                    <form action="{{ route('user.destroy', ['id' => $d->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- ./wrapper -->
@endsection

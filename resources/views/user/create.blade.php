@extends('layouts.app')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">Data User</a></li>
                        <li class="breadcrumb-item active">Tambah User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('user.create') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama1">Nama:</label>
                            <input name="name" type="name" class="form-control" id="nama1"
                                placeholder="Masukkan nama">
                            @error('name')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email1">Email:</label>
                            <input type="email" class="form-control" id="email1" name="email"
                                placeholder="Masukkan email">
                            @error('email')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Pilih</label>
                            <select class="form-control" type="level" name="level">
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                            </select>
                            @error('level')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pass">Password:</label>
                            <input type="password" class="form-control" id="pass" name="password"
                                placeholder="Masukkan password">
                            @error('password')
                                <small>*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"
                            class="btn bg-blue-900 text-white hover:bg-blue-700 hover:text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/transaksi/index', [TransaksiController::class, 'index'])->name('transaksi.index');

    Route::get('/transaksi/create', [TransaksiController::class, 'form'])->name('transaksi.create');
    Route::post('/transaksi/create', [TransaksiController::class, 'create']);

    Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::get('/transaksi/update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/destroy/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('/struk/{id}', [TransaksiController::class, 'struk'])->name('transaksi.struk');
});

<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/transaksi', [HomeController::class, 'transaksi'])->name('transaksi');
    Route::post('/transaksi', [HomeController::class, 'form']);
});

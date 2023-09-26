<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/beranda', [HomeController::class, 'beranda'])->name('beranda');

    Route::get('/data_user', [HomeController::class, 'user'])->name('data_user'); //--> /user/index
    Route::get('/edit_user/{id}', [HomeController::class, 'edit_user'])->name('edit_user'); //--> /user/edit/{id}
    Route::put('/update_user/{id}', [HomeController::class, 'update_user'])->name('update_user'); //--> /user/update/{id}
    Route::delete('/hapus_user/{id}', [HomeController::class, 'hapus_user'])->name('hapus_user'); //--> /user/destroy/{id}

    Route::get('/tambah_user', [HomeController::class, 'form_user'])->name('tambah_user');
    Route::post('/tambah_user', [HomeController::class, 'tambah_user']);

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/data_transaksi', [HomeController::class, 'data_transaksi'])->name('data_transaksi');
    Route::delete('/hapus_transaksi/{id}', [HomeController::class, 'hapus_transaksi'])->name('hapus_transaksi');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/transaksi.php';

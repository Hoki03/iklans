<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

    Route::get('/index', [UserController::class, 'index'])->name('index'); //--> /user/index
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit'); //--> /user/edit/{id}
    Route::put('/update/{id}', [UserController::class, 'update'])->name('update'); //--> /user/update/{id}
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy'); //--> /user/destroy/{id}

    Route::get('/create', [UserController::class, 'form'])->name('create');
    Route::post('/create', [UserController::class, 'create']);

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

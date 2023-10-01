<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');

    Route::get('/user/create', [UserController::class, 'form'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'create']);

    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

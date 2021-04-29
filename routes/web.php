<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\TuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/userrole', [UserController::class, 'index_role'])->name('user.role');
        Route::get('/role', [UserController::class, 'role_view'])->name('role');
        Route::get('/menu', [MenuController::class, 'index'])->name('menu');
        Route::get('/gunabayar', [AdminController::class, 'gunabayar'])->name('gunabayar');
    });
    Route::group(['middleware' => ['role:tata usaha']], function () {
        Route::get('/kelas', [TuController::class, 'kelas'])->name('kelas');
        Route::get('/siswa', [TuController::class, 'siswa'])->name('siswa');
        Route::get('/pembayaran', [TuController::class, 'pembayaran'])->name('pembayaran');
        Route::get('/pembayaranpt', [TuController::class, 'pembayaranpt'])->name('pembayaranpt');
        Route::resource('tu', 'App\Http\Controllers\TuController');
    });
    Route::group(['middleware' => ['role:panitia']], function () {
        Route::get('/pembayaranp', [PanitiaController::class, 'pembayaranp'])->name('pembayaranp');
        Route::resource('print', 'App\Http\Controllers\PrintController');
    });
});

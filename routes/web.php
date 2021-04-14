<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    });
    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/user', [UserController::class, "index"])->name('user');
    });
});

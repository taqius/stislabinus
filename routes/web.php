<?php

use App\Http\Controllers\SectionMenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/user', [UserController::class, "index_view"])->name('user');
        Route::view('/user/new', "pages.user.user-new")->name('user.new');
        Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
        Route::get('/menu', [SectionMenuController::class, 'index'])->name('menu');
    });
    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/user', [UserController::class, "index_view"])->name('user');
    });
});

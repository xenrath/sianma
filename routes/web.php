<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('cek-user', [App\Http\Controllers\HomeController::class, 'cek_user']);
Route::get('antrian/{id}', [App\Http\Controllers\HomeController::class, 'antrian']);

Route::middleware('auth')->group(function () {

    Route::middleware('dev')->group(function () {
        Route::get('dev', [\App\Http\Controllers\Dev\DashboardController::class, 'index']);
    });

    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index']);

        Route::get('petugas/reset-password/{id}', [\App\Http\Controllers\Admin\PetugasController::class, 'reset_password']);
        Route::resource('petugas', \App\Http\Controllers\Admin\PetugasController::class);
        
        Route::resource('loket', \App\Http\Controllers\Admin\LoketController::class);
    });

    Route::middleware('petugas')->prefix('petugas')->group(function () {
        Route::get('/', [\App\Http\Controllers\Petugas\HomeController::class, 'index']);
        Route::get('selanjutnya/{id}', [\App\Http\Controllers\Petugas\HomeController::class, 'selanjutnya']);
        Route::get('ulangi/{id}', [\App\Http\Controllers\Petugas\HomeController::class, 'ulangi']);

        Route::get('petugas/reset-password/{id}', [\App\Http\Controllers\Petugas\PetugasController::class, 'reset_password']);
        Route::resource('petugas', \App\Http\Controllers\Petugas\PetugasController::class);
        
        Route::resource('antrian', \App\Http\Controllers\Petugas\AntrianController::class);
    });
});

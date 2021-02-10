<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/beranda', [UserController::class, 'beranda'])->name('beranda');

Route::group(['middleware' => ['isGuest']], function () {
    Route::get('/', [UserController::class, 'formMasuk'])->name('masuk');
    Route::get('/daftar', [UserController::class, 'formDaftar'])->name('daftar');
    Route::post('/masuk/proses', [UserController::class, 'masuk'])->name('masuk.proses');
    Route::post('/daftar/proses', [UserController::class, 'daftar'])->name('daftar.proses');
});

Route::group(['middleware' => ['isAdmin']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

Route::group(['middleware' => ['isAdmin']], function () {
    Route::get('/keluar', [UserController::class, 'keluar'])->name('keluar');
});

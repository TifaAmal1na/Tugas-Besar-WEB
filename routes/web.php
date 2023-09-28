<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Pengajar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', UserController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('kelas', KelasController::class);
Route::resource('pengajar', PengajarController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi/cetak_pdf/{id}' , [TransaksiController::class, 'cetak_pdf'])->name('transaksi.cetak_pdf');

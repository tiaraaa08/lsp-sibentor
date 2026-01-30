<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Route::get('/layanan', function () {
//     return view('layanan.main');
// })->name('layanan.main');
// Route::get('/pelanggan', function () {
//     return view('pelanggan.main');
// })->name('pelanggan.main');
// Route::get('/transaksi', function () {
//     return view('transaksi.main');
// })->name('transaksi.main');
// Route::get('/laporan', function () {
//     return view('laporan.main');
// })->name('laporan.main');

Route::get('layanan', [LayananController::class, 'index'])->name('layanan.main');
Route::post('layanan/add', [LayananController::class, 'store'])->name('layanan.store');
Route::post('layanan/update/{id}', [LayananController::class, 'update'])->name('layanan.update');
Route::delete('layanan/destroy/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.main');
Route::post('pelanggan/add', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::post('pelanggan/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('pelanggan/destroy/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.main');
Route::post('transaksi/add', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::post('transaksi/update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('transaksi/destroy/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.main');
route::get('/', [LaporanController::class, 'beranda'])->name('beranda');
route::get('struk/{id}', [LaporanController::class, 'struk'])->name('struk');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Konsumen\DashboardkonsumenController;

Route::controller(DashboardkonsumenController::class)->group(function () {
    Route::get('/dashboard', 'index');
    Route::get('/produk', 'produk');
    Route::get('/masukeranjang/{produk}', 'masukeranjang');
    Route::post('/prosesmasukkeranjang/{produk}', 'prosesmasukkeranjang');
    Route::post('/checkout', 'checkout');
    Route::post('/prosescheckout', 'prosescheckout');
    Route::get('/keranjang', 'keranjang');
    Route::get('/transaksi', 'transaksi');
    Route::get('/transaksi/show/{id}', 'show');
    Route::post('/hapusKeranjang/{id}', 'hapusKeranjang');
    Route::get('/tentang', 'tentang');
    Route::get('/akun', 'akun');
    Route::post('/akunUpdate', 'akunUpdate');
});

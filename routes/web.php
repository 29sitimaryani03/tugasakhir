<?php

use App\Http\Controllers\Admin\DashboardadminController;
use App\Http\Controllers\Admin\KeranjangadminController;
use App\Http\Controllers\Admin\KonsumenadminController;
use App\Http\Controllers\Admin\ProdukadminController;
use App\Http\Controllers\Admin\TransaksiadminController;
use Illuminate\Support\Facades\Route;

Route::get('/tugasakhir/vendor/livewire/livewire.js', function () {
  return response()->file(asset('vendor/livewire/livewire.js'));
});

Route::prefix('/')->group(function () {
  include __DIR__ . '/_group/Landingrouter.php';
});


Route::prefix('admin')->group(function () {
  Route::resource('dashboard', DashboardadminController::class);
  Route::resource('produk', ProdukadminController::class);
  Route::resource('konsumen', KonsumenadminController::class);
  Route::resource('keranjang', KeranjangadminController::class);
  Route::resource('transaksi', TransaksiadminController::class);
});


Route::prefix('konsumen')->middleware(['auth:konsumen'])->group(function () {
  include __DIR__ . '/_group/Konsumenrouter.php';
});

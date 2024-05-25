<?php

use App\Http\Controllers\Admin\DashboardadminController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\KeranjangadminController;
use App\Http\Controllers\Admin\KonsumenadminController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\ProdukadminController;
use App\Http\Controllers\Admin\SosmedController;
use App\Http\Controllers\Admin\TransaksiadminController;
use App\Http\Controllers\Konsumen\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/tugasakhir/vendor/livewire/livewire.js', function () {
  return response()->file(asset('vendor/livewire/livewire.js'));
});

// Route::prefix('/')->group(function () {
//   include __DIR__ . '/_group/Landingrouter.php';
// });

// Route::prefix('konsumen')->middleware(['auth:konsumen'])->group(function () {
//   include __DIR__ . '/_group/Konsumenrouter.php';
// });


Route::prefix('admin')->group(function () {
  Route::resource('dashboard', DashboardadminController::class);
  Route::resource('produk', ProdukadminController::class);
  Route::resource('konsumen', KonsumenadminController::class);
  Route::resource('keranjang', KeranjangadminController::class);
  Route::resource('transaksi', TransaksiadminController::class);
  Route::resource('logo', LogoController::class);
  Route::resource('footer', FooterController::class);
  Route::resource('sosmed', SosmedController::class);
});

// Front View
Route::get('/', [ClientController::class, 'home']);
Route::get('home', [ClientController::class, 'home']);
Route::get('shop', [ClientController::class, 'shop']);
Route::get('product/{produk}', [ClientController::class, 'product']);

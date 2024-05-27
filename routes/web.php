<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardadminController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\KeranjangadminController;
use App\Http\Controllers\Admin\KonsumenadminController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\ProdukadminController;
use App\Http\Controllers\Admin\SosmedController;
use App\Http\Controllers\Admin\TransaksiadminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Konsumen\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/tugasakhir/vendor/livewire/livewire.js', function () {
  return response()->file(asset('vendor/livewire/livewire.js'));
});

// Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout']);

// Register
Route::get('regis', [AuthController::class, 'showRegis']);
Route::post('regis', [AuthController::class, 'store']);

// Admin
Route::prefix('admin')->group(function () {
  Route::resource('dashboard', DashboardadminController::class);
  Route::resource('produk', ProdukadminController::class);
  Route::resource('konsumen', KonsumenadminController::class);
  Route::resource('keranjang', KeranjangadminController::class);
  Route::resource('transaksi', TransaksiadminController::class);
  Route::resource('logo', LogoController::class);
  Route::resource('footer', FooterController::class);
  Route::resource('sosmed', SosmedController::class);
  Route::resource('banner', BannerController::class);
});

// Front View
Route::get('/', [ClientController::class, 'home']);
Route::get('home', [ClientController::class, 'home']);
Route::get('shop', [ClientController::class, 'shop']);
Route::get('cart', [ClientController::class, 'cart']);
Route::delete('cart/{cart}', [ClientController::class, 'destroy']);
Route::get('product/{produk}', [ClientController::class, 'product']);
Route::post('add_to_cart', [KeranjangadminController::class, 'addToCart']);
Route::get('checkout/{cart}', [ClientController::class, 'showCheckoutCart']);
Route::get('order', [ClientController::class, 'showPesan']);
Route::post('pesan', [ClientController::class, 'pesanan']);
Route::post('shop/filter', [ClientController::class, 'filter']);
Route::post('shop/filter2', [ClientController::class, 'filter2']);

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardadminController;
use App\Http\Controllers\Admin\ProdukadminController;
use App\Http\Controllers\Admin\KonsumenadminController;
use App\Http\Controllers\Admin\KeranjangadminController;
use App\Http\Controllers\Admin\TransaksiadminController;

Route::controller(DashboardadminController::class)->group(function () {
        Route::get('/dashboard', 'index');
    });

    // Produk controller
    Route::prefix('produk')->group(function () {
        Route::controller(ProdukadminController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::get('/edit/{id}', 'edit');
            Route::post('/update/{id}', 'update');
            Route::get('/show/{id}', 'show');
            Route::post('/hapus/{id}', 'hapus');
        });

    });

    // Konsumen controller
    Route::prefix('konsumen')->group(function () {
        Route::controller(KonsumenadminController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::get('/edit/{id}', 'edit');
            Route::post('/update/{id}', 'update');
            Route::post('/delete/{id}', 'delete');
        });

    });
    // Keranjang controller
    Route::prefix('keranjang')->group(function () {
        Route::controller(KeranjangadminController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::get('/edit/{id}', 'edit');
            Route::post('/update/{id}', 'update');
            Route::post('/delete/{id}', 'delete');
            Route::post('/checkout', 'checkout');
        });


    });
    // Transaksi controller
    Route::prefix('transaksi')->group(function () {
        Route::controller(TransaksiadminController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/create', 'create');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::get('/edit/{id}', 'edit');
            Route::post('/update/{id}', 'update');
            Route::post('/delete/{id}', 'delete');
            Route::post('/checkout', 'checkout');
        });


    });

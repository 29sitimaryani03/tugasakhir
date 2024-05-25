<?php

use Illuminate\Support\Facades\Route;

Route::get('/tugasakhir/vendor/livewire/livewire.js', function () {
    return response()->file(asset('vendor/livewire/livewire.js'));
});

Route::prefix('/')->group(function () {
 include __DIR__ . '/_group/Landingrouter.php';
});


Route::prefix('admin')->group(function () {
    include __DIR__ . '/_group/Adminrouter.php';
});


Route::prefix('konsumen')->middleware(['auth:konsumen'])->group(function () {
  include __DIR__ . '/_group/Konsumenrouter.php';
});

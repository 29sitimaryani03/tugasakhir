<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandingController;

Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/login', 'login')->name('login');
    Route::post('/aksiLogin', 'aksiLogin');
    Route::get('/registrasi', 'registrasi');
});

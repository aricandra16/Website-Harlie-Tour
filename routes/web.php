<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/csrf-token', fn () => response()->json(['token' => csrf_token()]))
    ->name('csrf-token');
Route::post('/bookings', [BookingController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('bookings.store');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/login', [AdminAuthController::class, 'create'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('login.store');

    Route::middleware('auth')->group(function (): void {
        Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
        Route::put('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('bookings.update');
        Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');
    });
});

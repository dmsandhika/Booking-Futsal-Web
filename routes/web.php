<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/booking', [BookingController::class, 'index']);
Route::post('/bookingLapangan', [BookingController::class, 'store'])->name('booking.store');
Route::get('/payment/{id}', [BookingController::class, 'show'])->name('payment.show');
Route::get('/payment-success/{id}', [BookingController::class, 'success'])->name('payment.success');
Route::get('/payment/download/{id}', [BookingCOntroller::class, 'download'])->name('payment.download');

Route::get('/payment', function () {
    return view('payment');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BookingController;

Route::get('/', [FaqController::class, 'index']);
Route::get('/booking', [BookingController::class, 'index']);
Route::post('/bookingLapangan', [BookingController::class, 'store'])->name('booking.store');
Route::get('/payment/{id}', [BookingController::class, 'show'])->name('payment.show');
Route::get('/payment-success/{id}', [BookingController::class, 'success'])->name('payment.success');
Route::get('/payment/download/{id}', [BookingCOntroller::class, 'download'])->name('payment.download');
Route::get('/search', function(){
    return view('search-transaksi');
});
Route::get('/cek', [BookingController::class, 'cekView']);
Route::get('/cekBooking', [BookingController::class, 'cekBooking'])->name('booking.cek');
Route::get('/search/transaksi', [BookingController::class, 'search'])->name('booking.search');

Route::get('/payment', function () {
    return view('payment');
});
Route::get('/contact', function () {
    return view('contact');
});
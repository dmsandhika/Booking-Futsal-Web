<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/booking', [BookingController::class, 'index']);
Route::get('/payment', function () {
    return view('payment');
});
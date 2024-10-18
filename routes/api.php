<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\LapanganController;
use App\Http\Controllers\Api\PropertiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('lapangan')->group(function (){
    Route::get('/', [LapanganController::class, 'index']);
    Route::get('/{id}', [LapanganController::class, 'show']); 
    Route::post('/', [LapanganController::class, 'store']);
    Route::put('/{id}', [LapanganController::class, 'update']);
    Route::delete('/{id}', [LapanganController::class, 'destroy']);
});

Route::prefix('properti')->group(function(){
    Route::get('/', [PropertiController::class, 'index']);
    Route::get('/{id}', [PropertiController::class, 'show']);
    Route::post('/', [PropertiController::class, 'store']);
    Route::put('/{id}', [PropertiController::class, 'update']);
    Route::delete('/{id}', [PropertiController::class, 'destroy']);
});

Route::prefix('faq')->group(function(){
    Route::get('/', [FaqController::class, 'index']);
    Route::get('/{id}', [FaqController::class, 'show']);
    Route::post('/', [FaqController::class, 'store']);
    Route::put('/{id}', [FaqController::class, 'update']);
    Route::delete('/{id}', [FaqController::class, 'destroy']);
});

Route::prefix('booking')->group(function(){
    Route::get('/', [BookingController::class, 'index']);
    Route::get('/{id}', [BookingController::class, 'show']);
    Route::post('/', [BookingController::class, 'store']);
    Route::put('/{id}', [BookingController::class, 'update']);
    Route::delete('/{id}', [BookingController::class, 'destroy']);
});
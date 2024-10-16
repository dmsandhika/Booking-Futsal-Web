<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LapanganController;

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
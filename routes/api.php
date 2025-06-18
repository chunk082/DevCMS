<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FigureController;
use App\Http\Controllers\Api\BadgeApiController;
use App\Http\Controllers\Store\CryptoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/figure/{username}', [FigureController::class, 'getFigure'])->name('api.figure');
Route::post('/crypto/ipn', [CryptoController::class, 'ipn'])->name('crypto.ipn');
Route::get('/crypto/expire-payments', [CryptoController::class, 'expireOldPayments']);
Route::get('/badges/habboon', [BadgeApiController::class, 'fetchHabboon']);



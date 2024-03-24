<?php

use App\Http\Controllers\ApiUserDataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('userData')->group(function () {
    Route::get('/list', [ApiUserDataController::class, 'index']);
    Route::post('/store', [ApiUserDataController::class, 'store']);
    Route::get('/find/{id}', [ApiUserDataController::class, 'show']);
    Route::post('/update/{id}', [ApiUserDataController::class, 'update']);
    Route::delete('/delete', [ApiUserDataController::class, 'destroy']);
});


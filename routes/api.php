<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::middleware('auth:api')->group(function(){
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('/appointments', [App\Http\Controllers\Api\AppointmentController::class, 'index']);
    Route::post('/appointments', [App\Http\Controllers\Api\AppointmentController::class, 'store']);

});

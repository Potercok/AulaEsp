<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::middleware('auth:api')->group(function(){
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
});

Route::group(['prefix'=> 'reservas','as'=>'reserva.'], function() {
    Route::middleware('auth:api')->group(function(){
        Route::get('/', [App\Http\Controllers\Api\ReservasController::class, 'index']);
        Route::post('/', [App\Http\Controllers\Api\ReservasController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\Api\ReservasController::class, 'show']);
        Route::put('/{id}', [App\Http\Controllers\Api\ReservasController::class, 'update']);
        Route::delete('/{id}', [App\Http\Controllers\Api\ReservasController::class, 'destroy']);
    });
});
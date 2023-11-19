<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReservasController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::group(['prefix'=> 'reservas','as'=>'reserva.'], function() {
    Route::middleware('auth:api')->group(function(){
        Route::get('/', [ReservasController::class, 'index']);
        Route::post('/', [ReservasController::class, 'store']);
        Route::get('/{id}', [ReservasController::class, 'show']);
        Route::put('/{id}', [ReservasController::class, 'update']);
        Route::delete('/{id}', [ReservasController::class, 'destroy']);
    });
});
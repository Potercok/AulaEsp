<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BitacoraController;

use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Auth; 

Route::get('/', function () {
    return view('auth/login');
}
);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index']);
Route::middleware(['auth', 'admin'])->group(function () {

    //rutas espacialidades = reservas
    //rutas de docentes
    Route::resource('docentes','App\Http\Controllers\Admin\DocenteController');
    Route::get('/estadisticas', [App\Http\Controllers\EstadisticasController::class, 'index']);
});
Route::get('/especialidades', [SpecialtyController::class, 'index']);
Route::get('/especialidades/create', [SpecialtyController::class, 'create']);
Route::put('/especialidades/{specialty}', [SpecialtyController::class, 'update']);
Route::get('/especialidades/{specialty}/edit', [SpecialtyController::class, 'edit']);
Route::post('/especialidades', [SpecialtyController::class, 'sendData']);
Route::delete('/especialidades/{specialty}', [SpecialtyController::class, 'destroy']);
Route::resource('activity_logs', ActivityLogController::class);
Route::get('/activity_logs/create', [ActivityLogController::class, 'create'])->name('activity_logs.create');
Route::get('/activity_logs/{id}/edit', [ActivityLogController::class, 'edit'])->name('activity_logs.edit');
Route::resource('activity_logs', ActivityLogController::class);
Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');

// Ruta para la descarga del PDF de la bitácora
Route::get('/bitacora/pdf', [BitacoraController::class, 'generatePDF'])->name('bitacora.pdf');

// Rutas de autenticación
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Rutas de registro
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');

// Rutas de restablecimiento de contraseña
Route::get('/password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');

// Rutas de confirmación de correo electrónico
Route::get('/email/verify', 'App\Http\Controllers/Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}', 'App\Http\Controllers/Auth\VerificationController@verify')->name('verification.verify');
Route::post('/email/resend', 'App\Http\Controllers/Auth\VerificationController@resend')->name('verification.resend');
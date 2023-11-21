<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\EventController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\Admin\DocenteController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;

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
    Route::resource('docentes', DocenteController::class);
    Route::get('/estadisticas', [EstadisticasController::class, 'index']);
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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas de restablecimiento de contraseña
Route::get('/password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ForgotPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class,'reset']);

// Rutas de confirmación de correo electrónico
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
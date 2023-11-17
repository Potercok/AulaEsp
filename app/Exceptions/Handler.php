<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // Aquí puedes agregar la lógica de reporte de excepciones si lo necesitas
        });


        // Manejar excepciones de autenticación
        $this->renderable(function (AuthenticationException $e, $request) {
            // Aquí puedes personalizar tu respuesta. Por ejemplo, puedes devolver un error en formato JSON.
            return response()->json(['error' => 'No autenticado o credenciales inválidas'], 401);
        });
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idUsuario = auth()->user()->id;
        $reservas = Specialty::where('user_id', $idUsuario)->get();
        return response()->json($reservas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'registro' => 'required'
        ]);

        // Obtener la cadena JSON desde la solicitud
        $jsonString = $request->registro;

        // Decodificar la cadena JSON a un objeto de PHP
        $registro = json_decode($jsonString);

        Log::info($request->all());

        $specialty = new Specialty();
        $specialty->nombre = $registro->nombre;
        $specialty->asignatura = $registro->asignatura;
        $specialty->trimestre = $registro->trimestre;

        //Datos de horarios
        $specialty->dia= $registro->fecha;
        $specialty->hora = $registro->hora;

        $specialty->grado = $registro->grado;
        $specialty->seccion = $registro->seccion;
        $specialty->aprendizaje = $registro->aprendizaje;
        $specialty->consideraciones = $registro->consideraciones;
        $specialty->articula = $registro->articula;
        $specialty->estrategias = $registro->estrategias;
        $specialty->descripcion = $registro->descripcion;
        $specialty->observaciones = $registro->observaciones;
        $specialty->user_id = auth()->user()->id;
        $specialty->save();

        return response()->json('Reserva creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

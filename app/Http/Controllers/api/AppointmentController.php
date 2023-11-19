<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Specialty::all();
        return response()->json($reservas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validamos los campos
        $this->validate($request, [
                'nombre'=>'required|min:3',
                'asignatura'=>'required',
                'trimestre'=>'required|numeric',
                'fecha'=>'required',
                'hora_inicio'=>'required',
                'hora_fin'=>'required',
                'grado'=>'required|numeric',
                'seccion'=>'required',
                'aprendizaje'=>'required',
                'articula'=>'required',
                'estrategias'=>'required'
            ]
        );

        $specialty = new Specialty();
        $specialty->nombre = $request->input('nombre');
        $specialty->asignatura = $request->input('asignatura');
        $specialty->trimestre = $request->input('trimestre');

        //Datos de horarios
        $specialty->fecha= $request->input('fecha');
        $specialty->hora_inicio = $request->input('hora_inicio');
        $specialty->hora_fin = $request->input('hora_fin');

        $specialty->grado = $request->input('grado');
        $specialty->seccion = $request->input('seccion');
        $specialty->aprendizaje = $request->input('aprendizaje');
        $specialty->consideraciones = $request->input('consideraciones');
        $specialty->articula = $request->input('articula');
        $specialty->estrategias = $request->input('estrategias');
        $specialty->descripcion = $request->input('descripcion');
        $specialty->observaciones = $request->input('observaciones');
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

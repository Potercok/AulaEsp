<?php

namespace App\Http\Controllers;

use App\Models\Bitacora; // Importa el modelo Bitacora
use Illuminate\Http\Request;
use App\Models\SpecialtyLog;
use App\Models\Specialty;
use PDF;

class BitacoraController extends Controller
{
    public function index(Request $request)
    {
        $query = SpecialtyLog::query();
        $nombreDocente = $request->query('nombre_docente');
        $mes = $request->input('mes');
        $grado = $request->input('grado');
        $seccion = $request->input('seccion');
       
    
        $logs = SpecialtyLog::when($mes, function ($query) use ($mes) {
            return $query->whereMonth('fecha', $mes);
        })
        ->when($grado, function ($query) use ($grado) {
            return $query->where('grado', $grado);
        })
        ->when($seccion, function ($query) use ($seccion) {
            return $query->where('seccion', $seccion);
        })
        ->when($nombreDocente, function ($query) use ($nombreDocente) {
            return $query->whereHas('user', function ($userQuery) use ($nombreDocente) {
                $userQuery->where('name', 'LIKE', '%' . $nombreDocente . '%');
            });
        })
        ->get();
    
        return view('bitacora.index', compact('logs','nombreDocente', 'mes', 'grado', 'seccion'));
        /*$bitacoraData = SpecialtyLog::all(); // Obtén todos los registros de la bitácora
        return view('bitacora.index', compact('bitacoraData'));
            // Obtén los valores de los filtros desde la solicitud
            $mes = $request->input('mes');
            $grado = $request->input('grado');
            $seccion = $request->input('seccion');
        $logs = SpecialtyLog::whereHas('specialty', function ($query) use ($mes, $grado, $seccion) {
            $query->whereMonth('dia', $mes);
            $query->where('grado', $grado);
            $query->where('seccion', $seccion);
        })->get();
       
        return view('bitacora.index', compact('logs'));*/
    }
    public function generatePDF(Request $request)
    {
        $mes = $request->input('mes');
        $grado = $request->input('grado');
        $seccion = $request->input('seccion');
        $nombreDocente = $request->input('nombre_docente');
    
        // Aplica los filtros a la consulta
        $logs = SpecialtyLog::when($mes, function ($query) use ($mes) {
            return $query->whereMonth('fecha', $mes);
        })
        ->when($grado, function ($query) use ($grado) {
            return $query->where('grado', $grado);
        })
        ->when($seccion, function ($query) use ($seccion) {
            return $query->where('seccion', $seccion);
        })
        ->when($nombreDocente, function ($query) use ($nombreDocente) {
            return $query->whereHas('user', function ($userQuery) use ($nombreDocente) {
                $userQuery->where('name', 'LIKE', '%' . $nombreDocente . '%');
            });
        })
        ->get();
    
        // Resto de la lógica para generar el PDF...
    
        $pdf = PDF::loadView('bitacora.pdf', compact('logs'));
    
        return $pdf->download('bitacora.pdf');
    }
    public function downloadPDF(Request $request)
    {
        // Recupera los parámetros de los filtros desde la URL
        $nombreDocente = $request->query('nombre_docente');
        $mes = $request->query('mes');
        $grado = $request->query('grado');
        $seccion = $request->query('seccion');

        // Lógica para generar el PDF con los filtros aplicados
        // ...

        // Devuelve el PDF o redirige según tu lógica
    }
    public function store(Request $request)
{
    // Aquí colocas la lógica para almacenar datos en la base de datos
}

    
    // Puedes eliminar o comentar la función store si no la utilizas
    /*
    public function store(Request $request)
    {
        // Aquí colocas la lógica para almacenar datos en la base de datos
    }
    */
}

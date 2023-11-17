<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Specialties;
use App\Models\Specialty;


class EstadisticasController extends Controller
{
    public function index()
    {
        $secciones = ['A', 'B', 'C', 'D', 'E', 'F'];
        $secciones = Specialty::select('seccion', DB::raw('COUNT(*) as total'))
        ->groupBy('seccion')
        ->get();
    
    $estadisticas = [];
    
    foreach ($secciones as $seccion) {
        $estadisticas[$seccion->seccion] = $seccion->total;
    }
    
        
        $grados = ['Primero', 'Segundo', 'Tercero'];

        $estadisticas = [];

        foreach ($grados as $grado) {
            foreach ($secciones as $seccion) {
                $conteo = DB::table('specialties')
                    ->where('grado', $grado)
                    ->where('seccion', $seccion)
                    ->count();

                    $seccion = trim($seccion);
                    if (!empty($seccion)) {
                        // Ahora puedes usar $seccion como índice en el arreglo
                        $estadisticas[$grado][$seccion] = $conteo;
                    } else {
                        // Maneja el caso en el que $seccion es una cadena vacía
                    }
            }
        }

        return view('estadisticas.index', compact('secciones','grados'));

    }
}



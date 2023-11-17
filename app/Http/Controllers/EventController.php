<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;
use Illuminate\Support\Facades\DB;
use PDF;

class EventController extends Controller
{
      // No olvides importar el facade al inicio de tu controlador

        public function downloadPdf() {
            $logs = ActivityLog::with('user')->get();

            $pdf = PDF::loadView('activity_logs.pdf', compact('logs'));
            return $pdf->download('bitacora.pdf');
        }

    public function index() {
        $specialties = Specialty::select('*', DB::raw('HOUR(hora) as hora_format'))->get();

        $events = [];
    
        foreach ($specialties as $specialty) {
            $events[] = [
                'title' => $specialty->nombre . '- inicia a las: ' . $specialty->hora_format,
                'start' => $specialty->dia,
                'allDay' => true // O setéalo a false si deseas especificar horas.
            ];
            
        }
        
    
        return response()->json($events);
    }
}

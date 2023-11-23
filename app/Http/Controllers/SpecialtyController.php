<?php

namespace App\Http\Controllers;

use App\Models\SpecialtyLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Specialty;
use Illuminate\Support\Facades\Log;

class SpecialtyController extends Controller
{
    //
    public function __construct()
    {
    $this->middleware('auth');
    }
    //
    public function index()
    {  
        $idUsuario = auth()->user()->id;
        $specialties = Specialty::select('*', DB::raw('HOUR(hora) as hora_format'))->where('user_id', $idUsuario)->get();
        return view('specialties.index', compact('specialties'));
    }
    public function create(){
        return view('specialties.create');
    }
    public function sendData(Request $request){
        $rules = [
            'nombre'=>'required|min:3',
            'asignatura'=>'required',
            
            'trimestre'=>'required|numeric',

            'fecha'=>'required',
            'hora'=>'required',

            'grado'=>'required|numeric',
            'seccion'=>'required',
            'aprendizaje'=>'required',
            'articula'=>'required',
            'estrategias'=>'required'
        ];
        $messages = [
            'nombre.required'=>'Se requiere el nombre',
            'nombre.min'=>'Se requiere un nombre valido',
            'trimestre.required'=>'Se requiere el trimestre',
            'trimestre.numeric'=>'Trimestre debe ser un valor numerico',
            'fecha.required'=>'Se requiere la fecha',
            'hora.required'=>'Se requiere la hora de inicio',
            'grado.required'=>'Se requiere el grado',
            'grado.numeric'=>'Grado debe ser un valor numerico',
            'seccion.required'=>'Se requierela seccion',
            'aprendizaje.required'=>'Se requiere el aprendizaje',
            'articula.required'=>'Se requiere una repuesta (si o no)',
            'estrategias.required'=>'Se requiere una estrategia'
        ];

        $this->validate($request,$rules,$messages);

        $specialty = new Specialty();

        // Assign the user_id
        
        $specialty->user_id = auth()->user()->id;

        $specialty->nombre = $request->input('nombre');
        $specialty->asignatura = $request->input('asignatura');
        $specialty->trimestre = $request->input('trimestre');
        $specialty->dia= $request->input('fecha');
        $hora = date('H:i:s', strtotime($request->input('hora')));
        $specialty->hora = $hora;
        $specialty->grado = $request->input('grado');
        $specialty->seccion = $request->input('seccion');
        $specialty->aprendizaje = $request->input('aprendizaje');
        $specialty->consideraciones = $request->input('consideraciones');
        $specialty->articula = $request->input('articula');
        $specialty->estrategias = $request->input('estrategias');
        $specialty->descripcion = $request->input('descripcion');
        $specialty->observaciones = $request->input('observaciones');
        

        $notification='La reserva se ha creado exitosamente.';

        $specialty->save();

        //Se guarda el log
        $log = new SpecialtyLog();
        $log->specialty_id = $specialty->id;
        $log->user_id = auth()->id();
        $log->fecha = $specialty->dia;// La fecha actual
        $log->grado = $specialty->grado;
        $log->seccion = $specialty->seccion;
        $log->horas_reservadas = 1; // Una hora reservada
        $log->save();


        return redirect('/especialidades')->with(compact('notification'));
    }
        public function edit(Specialty $specialty)
        {
            return view('specialties.edit', compact('specialty'));

        }

        public function update(Request $request,Specialty $specialty){
            $rules = [
                'nombre'=>'required|min:3',
                'asignatura'=>'required',
                'trimestre'=>'required',
                'hora'=>'required',
                'fecha'=>'required',
                'grado'=>'required',
                'seccion'=>'required',
                'aprendizaje'=>'required',
                'articula'=>'required',
                'estrategias'=>'required'
            ];
            $messages = [
                'nombre.required'=>'Se requiere el nombre',
                'nombre.min'=>'Se requiere un nombre valido',
                'trimestre.required'=>'Se requiere el trimestre',
                'hora.required'=>'Se requiere la hora',
                'grado.required'=>'Se requiere el grado',
                'seccion.required'=>'Se requierela seccion',
                'aprendizaje.required'=>'Se requiere el aprendizaje',
                'articula.required'=>'Se requiere una repuesta (si o no)',
                'estrategias.required'=>'Se requiere una estrategia',
                'fecha.required'=>'Se requiere la fecha'
                
            ];
            $this->validate($request,$rules,$messages);

            $specialty->nombre = $request->input('nombre');
            $specialty->asignatura = $request->input('asignatura');
            $specialty->trimestre = $request->input('trimestre');
            $specialty->hora = $request->input('hora');
            $specialty->grado = $request->input('grado');
            $specialty->dia = $request->input('fecha');
            $specialty->seccion = $request->input('seccion');
            $specialty->aprendizaje = $request->input('aprendizaje');
            $specialty->consideraciones = $request->input('consideraciones');
            $specialty->articula = $request->input('articula');
            $specialty->estrategias = $request->input('estrategias');
            $specialty->descripcion = $request->input('descripcion');
            $specialty->observaciones = $request->input('observaciones');
            $guardar = $specialty->nombre;
    
            $notification='La reserva de '. $guardar .' se ha actualizado exitosamente.';

            $specialty->save();

            if ($specialty->isDirty()) 
            {
                $log = new SpecialtyLog();
                $log->specialty_id = $specialty->id;
                $log->user_id = auth()->id();
                $log->fecha = now(); // La fecha actual
                $log->grado = $specialty->grado;
                $log->seccion = $specialty->seccion;
                $log->horas_reservadas = 1; // Una hora reservada
            $log->save();
            }   

            return redirect('/especialidades')->with(compact('notification'));
        }
        
        public function destroy(Specialty $specialty){
            $deleteName = $specialty->nombre;
            $specialty->delete();
            $notification='La reserva de '. $deleteName .' se ha eliminado exitosamente.';
            return redirect('/especialidades')->with(compact('notification'));
        }


}

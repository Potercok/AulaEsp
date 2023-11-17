<?php

namespace App\Http\Controllers\Docentes;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityLog;
use App\Models\SpecialtyLog;


class SpecialtyController extends Controller
{
    public function index()
    {  
        $userId = auth()->id();
        $specialties = Specialty::select('*', DB::raw('HOUR(hora) as hora_format'))->where('user_id', $userId)->get();

        return view('specialties.index', compact('specialties'));
        
    }
    public function create(){
        return view('specialties.create');
        
    }
    public function sendData(Request $request){
        $existeReserva = Specialty::where('dia', $request->input('dia'))
        ->where('hora', $request->input('hora'))
        ->count();

        if ($existeReserva > 0) {
        // Devuelve un error o un mensaje indicando que la hora ya está reservada
        return redirect()->back()->withInput()->withErrors(['error' => 'La hora seleccionada para ese día ya está reservada.']);
        }
        $rules = [
            'nombre'=>'required|min:3',
            'asignatura'=>'required',
            'dia'=>'required',
            'trimestre'=>'required',
            'hora'=>'required',
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
            'dia.required'=>'Seleccione por favor el dia',
            'hora.required'=>'Se requiere la hora',
            'grado.required'=>'Se requiere el grado',
            'seccion.required'=>'Se requierela seccion',
            'aprendizaje.required'=>'Se requiere el aprendizaje',
            'articula.required'=>'Se requiere una repuesta (si o no)',
            'estrategias.required'=>'Se requiere una estrategia'
            
        ];
        $this->validate($request,$rules,$messages);
        $specialty = new Specialty();
        $specialty->user_id = auth()->id();
        $specialty->nombre = $request->input('nombre');
        $specialty->asignatura = $request->input('asignatura');
        $specialty->dia = $request->input('dia');
        $specialty->trimestre = $request->input('trimestre');
        $specialty->hora = $request->input('hora');
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
        $log = new SpecialtyLog();
            $log->specialty_id = $specialty->id;
            $log->user_id = auth()->id();
            $log->fecha = $specialty->dia;// La fecha actual
            $log->grado = $specialty->grado;
            $log->seccion = $specialty->seccion;
            $log->horas_reservadas = 1; // Una hora reservada
            $log->save();
       /* ActivityLog::create([
            'user_id' => auth()->id(),
            'description' => 'El usuario ' . auth()->user()->name . ' creó una nueva reserva para el dia: '. $specialty->dia,
            'date' => today()
        ]);
        $log = new SpecialtyLog();
        $log->fecha = now(); // La fecha actual
        $log->grado = $specialty->grado;
        $log->seccion = $specialty->seccion;
        $log->horas_reservadas = 1; // Una hora reservada
        $log->specialty_id = $specialty->id; // Establece la relación
        $log->save();*/
        return redirect('/especialidades')->with(compact('notification'));


    }
        public function edit(Specialty $specialty)
        {
            return view('specialties.edit', compact('specialty'));
        }

        public function update(Request $request,Specialty $specialty){
            $existeReserva = Specialty::where('dia', $request->input('dia'))
                ->where('hora', $request->input('hora'))
                ->where('id', '!=', $specialty->id)
                ->count();

        if ($existeReserva > 0) {
        // Devuelve un error o un mensaje indicando que la hora ya está reservada
        return redirect()->back()->withInput()->withErrors(['error' => 'La hora seleccionada para ese día ya está reservada.']);
        }
            $rules = [
                'nombre'=>'required|min:3',
                'asignatura'=>'required',
                'trimestre'=>'required',
                'dia'=>'required',

                'hora'=>'required',
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
                'dia.required'=>'Seleccione por favor el dia',

                'hora.required'=>'Se requiere la hora',
                'grado.required'=>'Se requiere el grado',
                'seccion.required'=>'Se requierela seccion',
                'aprendizaje.required'=>'Se requiere el aprendizaje',
                'articula.required'=>'Se requiere una repuesta (si o no)',
                'estrategias.required'=>'Se requiere una estrategia'
                
            ];
            $this->validate($request,$rules,$messages);
    
            
            $specialty->nombre = $request->input('nombre');
            $specialty->asignatura = $request->input('asignatura');
            $specialty->dia = $request->input('dia');
            $specialty->trimestre = $request->input('trimestre');
            $specialty->hora = $request->input('hora');
            $specialty->grado = $request->input('grado');
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
            ActivityLog::create([
                'user_id' => auth()->id(),
                'description' => 'El usuario ' . auth()->user()->name . ' eliminó una reserva de el dia: ' . $specialty->dia,
                'date' => today()
            ]);
            return redirect('/especialidades')->with(compact('notification'));
        }


}

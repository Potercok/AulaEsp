<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;
namespace App\Http\Controllers;

use App\Models\SpecialtyLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Specialty;
use Illuminate\Support\Facades\Log;

class adminController extends Controller
{
    public function index()
    {  
        $specialties = Specialty::select('*', DB::raw('HOUR(hora) as hora_format'))->get();

        return view('admin.index', compact('specialties'));
    }
    public function destroy(Specialty $specialty){
        $deleteName = $specialty->nombre;
        $specialty->delete();
        $notification='La reserva de '. $deleteName .' se ha eliminado exitosamente.';
        return redirect('/admin')->with(compact('notification'));
    }
    
}

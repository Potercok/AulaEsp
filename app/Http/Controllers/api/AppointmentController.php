<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(){
        $user = Auth::guard('api')->user();
        $appointments = $user ->asDocenteAppointments()
        ->get([
            "nombre",
            "asignatura",
            //"dia",
            //"hora",
            "seccion",
            //"grado"
        ]);
        return response() ->json($appointments);
    }
    public function sendData(sendDataSpecialty $request){

    }
}

@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class= "card-header border-0">
     <div class="row align-items-center">
         <div class= "col">
             <h3 class= "mb-0">Bitacora</h3>
         </div>
         <div class= "col text-right">
            <a href="{{url ('avtivity_logs/create')}}" class="btn btn-primary">Agregar Entrada</a>
         </div>
     </div>
</div>
<div class="card-body">
    @if(session('notification'))
    <div class="alert alert-success" role="alert">
    {{session ('notification')}}
</div>
    @endif
</div>
<div class= "table-responsive">
     <!-- Projects table -->
     <table class="table mt-3">
        <thead>
            <tr>
                <th>Evento</th>
                <th>Descripción</th>
                <th>Fecha de modificacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->description }}</td>
                <td>{{ $log->date }}</td>
                <td>
                  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('activity_logs.pdf') }}" class="btn btn-primary">Descargar Bitácora en PDF</a>


    <div class="card-body">
    {{
        $logs->links()
    }}
    </div>



@endsection
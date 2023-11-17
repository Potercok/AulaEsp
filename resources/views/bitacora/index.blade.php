@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class= "card-header border-0">
     <div class="row align-items-center">
         <div class= "col">
             <h3 class= "mb-0">Bitácora de Reservas</h3>
         </div>
         <div class= "col text-right">
         
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
<div class="container" >
    
<div class="form-group" >
    <form method="GET" action="{{ route('bitacora.index') }}" method="get">
            <!-- formulario de filtrado -->
            <label for="nombre_docente">Nombre del Docente:</label>
            <input type="text" name="nombre_docente" value="{{ request('nombre_docente') }}"  placeholder="Filtrar por docente">
        
        <label for="mes">Mes:</label>
        <select name="mes" id="mes">
            <!-- Opciones para seleccionar el mes -->
            <option disabled selected>-Filtrar por mes-</option>
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>           
            <option value="05">Mayo</option>
            <option value="06">Junio</option> 
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
    
        <label for="grado">Grado:</label>
        <select name="grado" id="grado">
            <!-- Opciones para seleccionar el grado -->
            <option disabled selected>-Filtrar por grado-</option>
            <option value="1">Primer grado</option>
            <option value="2">Segundo grado</option>
            <option value="3">Tercer grado</option>
        </select>

        <label for="seccion">Sección:</label>
        <select name="seccion" id="seccion">
            <!-- Opciones para seleccionar la sección -->
            <option disabled selected>-Filtrar por seccion-</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
        </select>
        <div class= "col text-center">
            <button type="submit" class="btn btn-primary">Filtrar</button>

        </div>  

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre del docente</th>
                <th>Grado</th>
                <th>Sección</th>
                <th>Horas Reservadas</th>
                @php
                    $totalHoras = 0; // Inicializar el total de horas
                @endphp
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->fecha }}</td>
                    <td>{{ $log->user->name }}</td> <!-- Nombre del docente -->
                    <td>{{ $log->grado }}°</td>
                    <td>{{ $log->seccion }}</td>
                    <td>{{ $log->horas_reservadas }}</td>
                    @php
                        $totalHoras += $log->horas_reservadas; // Sumar las horas al total
                    @endphp
                </tr>
            @endforeach
        </tbody>
        <tfoot>
    <tr>
        <!-- Otras columnas ... -->
        <td>Total: {{ $totalHoras }} horas</td>
    </tr>
    
</tfoot>
    </table>
    <a href="{{ route('bitacora.pdf', ['nombre_docente' => $nombreDocente, 'mes' => $mes, 'grado' => $grado, 'seccion' => $seccion]) }}" class="btn btn-primary">Descargar PDF</a>

    </form>
</div>
@endsection


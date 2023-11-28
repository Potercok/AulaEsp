@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class= "card-header border-0">
     <div class="row align-items-center">
         <div class= "col">
             <h3 class= "mb-0">Todas las reservas</h3>
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
     <table class= "table align-items-center table-flush">
         <thead class= "thead-light">
             <tr>
                 <th scope= "col">Nombre </th>
                 <th scope= "col" >Asignatura</th>
                 <th scope= "col" >Trimestre</th>
                 <th scope= "col" >Día</th>
                 <th scope= "col" >Hora</th>
                 <th scope= "col" >Grado</th>
                 <th scope= "col" >Sección</th>
                 <th scope= "col" >Aprendizaje</th>
                 <th scope= "col" >Consideraciones</th>
                 <th scope= "col" >Estrategias</th>
                 <th scope= "col" >Descripcion</th>
                 <th scope= "col" >Observaciones</th>
                 <th scope= "col" >Opciones</th>
                 <!--<th scope="col" >Bounce rate</th>-->
             </tr>
         </thead>
            <tbody>
                @foreach($specialties as $especialidad)
                <tr>
                    <th >
                        {{$especialidad->nombre}}
                    </th>
                    <td>
                        {{$especialidad->asignatura}}
                    </td>
                    <td scope="row">
                        {{$especialidad->trimestre}}
                    </td>
                    <td>
                        {{$especialidad->hora_format}}:00
                    </td>
                    <td>
                        {{$especialidad->dia}}
                    </td>
                    <td>
                        {{$especialidad->grado}}°
                    </td>
                    <th >
                        {{$especialidad->seccion}}
                    </th>
                    <th >
                        {{$especialidad->aprendizaje}}
                    </th>
                    <th >
                        {{$especialidad->consideraciones}}
                    </th>
                    <th >
                        {{$especialidad->estrategias}}
                    </th>
                    <th >
                        {{$especialidad->descripcion}}
                    </th>
                    <th >
                        {{$especialidad->observaciones}}
                    </th>
                    <td>
                    
                    <form action="{{url('/admin/'.$especialidad->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>    
                    
                    </td>
        
                </tr>
                @endforeach
            </tbody>
        </table>
        
        
    </div>
    <small class="text-warning">Solo elimina clases si es necesario</small>
</div>



@endsection

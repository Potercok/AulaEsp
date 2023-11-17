@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class= "card-header border-0">
     <div class="row align-items-center">
         <div class= "col">
             <h3 class= "mb-0">Docentes</h3>
         </div>
         <div class= "col text-right">
             <a href="{{url ('/docentes/create')}}" class="btn btn-sm btn-primary" >Nuevo Docente</a>
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
               
                 <th scope= "col" >Correo</th>
                 <th scope="col" >Rol </th>
                 <th scope="col" >Opciones </th>
                 <!--<th scope="col" >Bounce rate</th>-->
             </tr>
         </thead>
            <tbody>
                @foreach($docentes as $docente)
                <tr>
                    <th scope="row">
                        {{$docente->name}}
                    </th>
                    <td>
                        {{$docente->email}}
                    </td>
                    <td>
                        {{$docente->role}}
                    </td>
                    <td>
                    <form action="{{url('/docentes/'.$docente->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{url('/docentes/'.$docente->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>    
                    </td>
        
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card-body">
    {{
        $docentes->links()
    }}
</div>


@endsection

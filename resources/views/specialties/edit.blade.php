@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class= "card-header border-0">
        <div class="row align-items-center">
            <div class= "col">
                <h3 class= "mb-0">Editar Reserva</h3>
            </div>
            <div class= "col text-right">
                <a href="{{url ('/especialidades')}}" class="btn btn-sm btn-success" >
                <i class="fas fa-chevron-left"></i> Regresar</a>
            </div>
         </div>
    </div>
    <div class="card-body">
        @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i> 
                <strong>Por favor!!</strong> {{$error}}
            </div>
            @endforeach
        @endif
        <form action="{{url('/especialidades/'.$specialty->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del profesor</label>
                <input type="text" name="nombre" class="form-control" value="{{old('nombre',$specialty->nombre)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Asignatura</label>
                <input type="text" name="asignatura" class="form-control" value="{{old('asignatura',$specialty->asignatura)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Trimestre</label>
                <input type="integer" name="trimestre" class="form-control" value="{{old('trimestre',$specialty->trimestre)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Hora</label>
                <input type="integer" name="hora" class="form-control" value="{{old('hora',$specialty->hora)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Grado</label>
                <input type="integer" name="grado" class="form-control" value="{{old('grado',$specialty->grado)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Seccion</label>
                <input type="integer" name="seccion" class="form-control" value="{{old('seccion',$specialty->seccion)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Aprendizaje</label>
                <input type="text" name="aprendizaje" class="form-control" value="{{old('aprendizaje',$specialty->aprendizaje)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Consideraciones</label>
                <input type="text" name="consideraciones" class="form-control" value="{{old('consideraciones',$specialty->consideraciones)}}">
            </div>
            <div class="form-group">
                <label for="description">¿Articula con otra materia?</label>
                <input type="text" name="articula" class="form-control" value="{{old('articula',$specialty->articula)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Estrategias</label>
                <input type="text" name="estrategias" class="form-control" value="{{old('estrategias',$specialty->estrategias)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripcionn</label>
                <input type="text" name="descripcion" class="form-control" value="{{old('descripcion',$specialty->descripcion)}}">
            </div>
            <div class="form-group">
                <label for="description">Observaciones</label>
                <input type="text" name="observaciones" class="form-control" value="{{old('observaciones',$specialty->observaciones)}}" >
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Cambiar Resarva</button>
        </form>
    </div>
</div>

@endsection
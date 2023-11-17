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
                <input type="text" name="nombre" class="form-control" readonly value="{{old('nombre',$specialty->nombre)}}" required>
            </div>
            <div class="semi-square">
                <label for="description">Asignatura:</label>
                <select name="asignatura" >
                    <option value="Español"{{ (old('asignatura', $specialty->asignatura) == "Español") ? 'selected' : '' }}>Español</option>
                    <option value="Educación Física"{{ (old('asignatura', $specialty->asignatura) == "Educación Física") ? 'selected' : '' }}>Educación Física</option>
                    <option value="Matematicas"{{ (old('asignatura', $specialty->asignatura) == "Matematicas") ? 'selected' : '' }}>Matematicas</option>
                    <option value="Inglés"{{ (old('asignatura', $specialty->asignatura) == "Inglés") ? 'selected' : '' }}>Inglés</option>
                    <option value="Matematicas"{{ (old('asignatura', $specialty->asignatura) == "Matematicas") ? 'selected' : '' }}>Matematicas</option>
                    <option value="Química"{{ (old('asignatura', $specialty->asignatura) == "Química") ? 'selected' : '' }}>Química</option>
                </select>
                <label for="description">&emsp;&emsp;  </label>
            <label for="description">Trimestre:</label>
                <select name="trimestre">
                    <option value="1" {{ (old('trimestre', $specialty->trimestre) == "1") ? 'selected' : '' }}>1</option>
                    <option value="2" {{ (old('trimestre', $specialty->trimestre) == "2") ? 'selected' : '' }}>2</option>
                    <option value="3" {{ (old('trimestre', $specialty->trimestre) == "3") ? 'selected' : '' }}>3</option>
                </select>
                <label for="description">&emsp;&emsp;  </label>
                <label for="description">Hora:</label>
                <select name="hora">
                    <option value="07:00:00" {{ (old('hora', $specialty->hora) == "07:00:00") ? 'selected' : '' }}>1ª</option>
                    <option value="08:00:00" {{ (old('hora', $specialty->hora) == "08:00:00") ? 'selected' : '' }}>2ª</option>
                    <option value="09:00:00" {{ (old('hora', $specialty->hora) == "09:00:00") ? 'selected' : '' }}>3ª</option>
                    <option value="10:00:00" {{ (old('hora', $specialty->hora) == "10:00:00") ? 'selected' : '' }}>4ª</option>
                    <option value="11:00:00" {{ (old('hora', $specialty->hora) == "11:00:00") ? 'selected' : '' }}>5ª</option>
                    <option value="12:00:00" {{ (old('hora', $specialty->hora) == "12:00:00") ? 'selected' : '' }}>6ª</option>
                    <option value="13:00:00" {{ (old('hora', $specialty->hora) == "13:00:00") ? 'selected' : '' }}>7ª</option>
                </select>
                <label for="description">&emsp;&emsp;</label>
                <label for="description">Grado:</label>
                <select name="grado">
                    <option value="1" {{ (old('grado', $specialty->grado) == "1") ? 'selected' : '' }}>1</option>
                    <option value="2" {{ (old('grado', $specialty->grado) == "2") ? 'selected' : '' }}>2</option>
                    <option value="3" {{ (old('grado', $specialty->grado) == "3") ? 'selected' : '' }}>3</option>
                </select>
                <label for="description">&emsp;&emsp;</label>
                <label for="description">Seccion:</label>
                <select name="seccion">
                    <option value="A" {{ (old('seccion', $specialty->seccion) == "A") ? 'selected' : '' }}>A</option>
                    <option value="B" {{ (old('seccion', $specialty->seccion) == "B") ? 'selected' : '' }}>B</option>
                    <option value="C" {{ (old('seccion', $specialty->seccion) == "C") ? 'selected' : '' }}>C</option>
                    <option value="D" {{ (old('seccion', $specialty->seccion) == "D") ? 'selected' : '' }}>D</option>
                    <option value="E" {{ (old('seccion', $specialty->seccion) == "E") ? 'selected' : '' }}>E</option>
                    <option value="F" {{ (old('seccion', $specialty->seccion) == "F") ? 'selected' : '' }}>F</option>
                </select>
            </div>
            <label for="description">Dia</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                    <input id="dia" name="dia" class="form-control datepicker" placeholder="Selecciona fecha" 
                    type="text" value="{{old('dia',$specialty->dia)}}" data-date-format="yyyy-mm-dd" 
                    data-date-start-date="{{date('Y-m-d')}}"
                    data-date-end-date="+30d">
            </div>
            <div class="form-group">
                <label for="description">Aprendizaje:</label>
                <input type="text" name="aprendizaje" class="form-control" value="{{old('aprendizaje',$specialty->aprendizaje)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Consideraciones:</label>
                <input type="text" name="consideraciones" class="form-control" value="{{old('consideraciones',$specialty->consideraciones)}}">
            </div>
            <div class="form-group">
                <label for="description">¿Articula con otra materia?</label>
                <input type="text" name="articula" class="form-control" value="{{old('articula',$specialty->articula)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Estrategias:</label>
                <input type="text" name="estrategias" class="form-control" value="{{old('estrategias',$specialty->estrategias)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripcionn:</label>
                <input type="text" name="descripcion" class="form-control" value="{{old('descripcion',$specialty->descripcion)}}">
            </div>
            <div class="form-group">
                <label for="description">Observaciones:</label>
                <input type="text" name="observaciones" class="form-control" value="{{old('observaciones',$specialty->observaciones)}}" >
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Cambiar Resarva</button>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

@endsection
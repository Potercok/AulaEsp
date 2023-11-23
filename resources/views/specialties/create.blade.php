@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class= "card-header border-0">
        <div class="row align-items-center">
            <div class= "col">
                <h3 class= "mb-0">Nueva Reserva</h3>
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
        <form action="{{url('/especialidades')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del profesor</label>
                <input type="text" name="nombre" class="form-control" readonly value="{{auth()->user()->name}}" required>
            </div>

            <div class="form-group">

            <label for="description">Asignatura:</label>
                <select name="asignatura" class="form-control">
                    <option  disabled selected>-Elige una Asignatura-</option>
                    <option value="Español"{{ old('asignatura') == 'Español' ? 'selected' : '' }}>Español</option>
                    <option value="Educación Física"{{ old('asignatura') == 'Educación Física' ? 'selected' : '' }}>Educación Física</option>
                    <option value="Matematicas"{{ old('asignatura') == 'Matematicas' ? 'selected' : '' }}>Matematicas</option>
                    <option value="Inglés"{{ old('asignatura') == 'Inglés' ? 'selected' : '' }}>Inglés</option>
                    <option value="Matematicas"{{ old('asignatura') == 'Matematicas' ? 'selected' : '' }}>Matematicas</option>
                    <option value="Química"{{ old('asignatura') == 'Química' ? 'selected' : '' }}>Química</option>
                </select>

            </div>

            <div class="form-group">
            <label for="description">Trimestre:</label>
                <select name="trimestre" class="form-control">
                    <option  disabled selected>-Elige el trimestre-</option>
                    <option value="1"{{ old('trimestre') == '1' ? 'selected' : '' }}>1</option>
                    <option value="2"{{ old('trimestre') == '2' ? 'selected' : '' }}>2</option>
                    <option value="3"{{ old('trimestre') == '3' ? 'selected' : '' }}>3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Fecha</label>
                <input type="date" name="fecha" class="form-control" value="{{old('fecha')}}" required>
            </div>

            <div class="form-group">
            <label for="description">Hora:</label>
                <select name="hora" class="form-control" value="{{old('hora')}}" required>
                    <option  disabled selected>-Elige una Hora-</option>
                    <option value="07:00:00"{{ old ('hora') == '1' ? 'selected' : '' }}>1ª</option>
                    <option value="08:00:00"{{ old ('hora') == '2' ? 'selected' : '' }}>2ª</option>
                    <option value="09:00:00"{{ old ('hora') == '3' ? 'selected' : '' }}>3ª</option>
                    <option value="10:00:00"{{ old ('hora') == '4' ? 'selected' : '' }}>4ª</option>
                    <option value="11:00:00"{{ old ('hora') == '5' ? 'selected' : '' }}>5ª</option>
                    <option value="12:00:00"{{ old ('hora') == '6' ? 'selected' : '' }}>6ª</option>
                    <option value="13:00:00"{{ old ('hora') == '7' ? 'selected' : '' }}>7ª</option>
                </select>
            </div>

            <div class="form-group">
            <label for="description">Grado:</label>
            <select name="grado" class="form-control"  value="{{old('grado')}}" required>
                <option  disabled selected>-Elige un Grado-</option>
                <option value="1"{{ old ('grado') == '1' ? 'selected' : '' }}>1</option>
                <option value="2"{{ old ('grado') == '2' ? 'selected' : '' }}>2</option>
                <option value="3"{{ old ('grado') == '3' ? 'selected' : '' }}>3</option>
            </select>
            </div>

            <div class="form-group">
            <label for="description">Sección:</label>
            <select name="seccion" class="form-control" value="{{old('seccion')}}" required>
                <option  disabled selected>-Elige una Seccion-</option>
                <option value="A"{{ old ('seccion') == 'A' ? 'selected' : '' }}>A</option>
                <option value="B"{{ old ('seccion') == 'B' ? 'selected' : '' }}>B</option>
                <option value="C"{{ old ('seccion') == 'C' ? 'selected' : '' }}>C</option>
                <option value="D"{{ old ('seccion') == 'D' ? 'selected' : '' }}>D</option>
                <option value="E"{{ old ('seccion') == 'E' ? 'selected' : '' }}>E</option>
                <option value="F"{{ old ('seccion') == 'F' ? 'selected' : '' }}>F</option>
            </select>
            </div>

            <div class="form-group">
                <label for="description">Aprendizaje</label>
                <input type="text" name="aprendizaje" class="form-control" value="{{old('aprendizaje')}}" required>
            </div>
            <div class="form-group">
                <label for="description">Consideraciones</label>
                <input type="text" name="consideraciones" class="form-control" value="{{old('consideraciones')}}">
            </div>
            <div class="form-group">
                <label for="description">¿Articula con otra materia?</label>
                <input type="text" name="articula" class="form-control" value="{{old('articula')}}" required>
            </div>
            <div class="form-group">
                <label for="description">Estrategias</label>
                <input type="text" name="estrategias" class="form-control" value="{{old('estrategias')}}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
            </div>
            <div class="form-group">
                <label for="description">Observaciones</label>
                <input type="text" name="observaciones" class="form-control" value="{{old('observaciones')}}" >
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Crear Resarva</button>
        </form>

    </div>
</div>

@endsection

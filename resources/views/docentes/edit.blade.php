<?php   
  use Illuminate\Support\Str;  
?>

@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class= "card-header border-0">
        <div class="row align-items-center">
            <div class= "col">
                <h3 class= "mb-0">Editar docente</h3>
            </div>
            <div class= "col text-right">
                <a href="{{url ('/docentes')}}" class="btn btn-sm btn-success" >
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
        <form action="{{url('/docentes/'.$docente->id)}}" method="POST"> 
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre del profesor</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$docente->name)}}">
            </div>
            <div class="form-group">
                <label for="email">Correo electronico</label>
                <input type="text" name="email" class="form-control" value="{{old('email',$docente->email)}}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control"   >
                <small class="text-warning">Solo llena el campo si deseas cambiar la contraseña</small>
            </div>
            <!--<div class="form-group">
                <label for="role">rol</label>
                <input type="text" name="role" class="form-control" value="{{old('role',$docente->role)}}">
            </div>-->
            <div class="form-group">
                <label for="role">Rol:</label>
                <small class="text-muted">Verifica el rol </small>
            </div>
            <div class="form-group">
                <input type="radio" name="role" value="admin" > Administrador
            </div>
            <div class="form-group">
                <input type="radio" name="role" value="docente"> Docente
            </div>


            <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
        </form>
    </div>
</div>

@endsection

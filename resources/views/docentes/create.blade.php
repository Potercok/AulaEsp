<?php   
  use Illuminate\Support\Str;  
?>

@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class= "card-header border-0">
        <div class="row align-items-center">
            <div class= "col">
                <h3 class= "mb-0">Nuevo docente</h3>
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
        <form action="{{url('/docentes')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del profesor</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <small class="text-muted">Esta contraseña es aleatoria puede cambiarla o bien recordar esta misma</small>
                <input type="integer" name="password" class="form-control" value="{{old('password',Str::random(8))}}" required>
            </div>
            <div class="form-group">
                <label for="role">Rol:</label>
                <small class="text-muted">Verifica el rol </small>
            </div>
            <div class="form-group">
                <input type="radio" name="role" value="admin" > Administrador
            </div>
            <div class="form-group">
                <input type="radio" name="role" value="docente" checked> Docente
            </div>


            <button type="submit" class="btn btn-sm btn-primary">Registrar docente</button>
        </form>
    </div>
</div>

@endsection

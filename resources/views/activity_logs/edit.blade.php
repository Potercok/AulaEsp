@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class= "card-header border-0">
     <div class="row align-items-center">
         <div class= "col">
             <h3 class= "mb-0">Editar entrada de bitacora</h3>
             <form action="{{ route('activity_logs/update', $logs) }}" method="POST">
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
     <div class="card-body">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Descripción</label>
            <textarea name="description" class="form-control" required>{{ $log->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Fecha</label>
            <input type="date" name="date" class="form-control" value="{{ $log->date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection


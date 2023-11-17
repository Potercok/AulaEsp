@extends('layouts.panel')

@section('content')
<div class="container">
    <h2>Agregar Entrada a Bitácora</h2>

    <form action="{{ route('activity_logs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Descripción</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Fecha</label>
            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
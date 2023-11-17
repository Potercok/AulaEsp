@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bitácora del usuario {{auth()->user()->name}}</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Grado</th>
                <th>Sección</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Veces reservado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bitacora as $registro)
            <tr>
                <td>{{ $registro->user->name }}</td>
                <td>{{ $registro->grado }}</td>
                <td>{{ $registro->seccion }}</td>
                <td>{{ $registro->fecha }}</td>
                <td>{{ $registro->hora }}</td>
                <td>{{ $registro->veces_reservado }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

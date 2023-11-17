<!-- resources/views/bitacora/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Bitácora PDF</title>
</head>
<body>

    <h1>Bitácora</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre del docente</th>
                <th>Grado</th>
                <th>Sección</th>
                <th>Horas Reservadas</th>
                @php
                    $totalHoras = 0; // Inicializar el total de horas
                @endphp
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->fecha }}</td>
                    <td>{{ $log->user->name }}</td> <!-- Nombre del docente -->
                    <td>{{ $log->grado }}°</td>
                    <td>{{ $log->seccion }}</td>
                    <td>{{ $log->horas_reservadas }}</td>
                    @php
                        $totalHoras += $log->horas_reservadas; // Sumar las horas al total
                    @endphp
                </tr>
            @endforeach
        </tbody>
        <tfoot>
    <tr>
        <!-- Otras columnas ... -->
        <td>Total: {{ $totalHoras }} horas</td>
    </tr>

</body>
</html>

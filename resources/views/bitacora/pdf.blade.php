<!-- resources/views/bitacora/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Bitácora PDF</title>
</head>
<body>
    <img src="{{ public_path('img/logo.png') }}" alt="Logo" style="position: absolute; right: 20px; width: 80px; height: 80px;">
    <img src="{{ public_path('img/logoSEED.png') }}" alt="Logo1" style="position: absolute; left: 20px; width: 80px; height: 80px;">
    <p style="text-align: center; margin-top: 0; margin-bottom: 0;">ESCUELA SECUNDARIA GENERAL "BENITO JUAREZ</p>
    <p style="text-align: center; margin-top: 0; margin-bottom: 0;">C.C.T 10DES0008P</p>
    <p style="text-align: center; margin-top: 0; margin-bottom: 0;">REPORTE DEL USO DE AULA DE MEDIOS</p>
    <p style="text-align: center; margin-top: 30; margin-bottom: 0;"></p>
    <!--p class="text-right"><img src="{{asset('img/logo.png')}}"></p-->
    
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
    </tfoot>

</body>
</html>

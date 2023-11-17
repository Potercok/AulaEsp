<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bitácora de Actividad</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bitácora de Actividad</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Fecha de Modificación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
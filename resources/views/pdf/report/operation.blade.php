<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evidencia de operacion</title>
    <style>
        .image-table {
            width: 100%;
            border-collapse: collapse;
        }

        .image-table td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }

        .image-table img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <table class="image-table">
        <tr>
            <td><img src="{{ asset($evidencia_record) }}" alt="Imagen 1"></td>
        </tr>
        <tr>
            <td><img src="{{ asset($evidencia_track) }}" alt="Imagen 2"></td>
        </tr>
        <tr>
            <td><img src="{{ asset($evidencia_gps) }}" alt="Imagen 3"></td>
        </tr>
    </table>
</body>
</html>

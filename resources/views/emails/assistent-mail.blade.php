<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send email</title>
</head>

<body>

    <p>
        OPERACION NO: {{ $mailData['data']->id }}
    </p>

    <p>
        <strong>FECHA OPERACIÓN:</strong> {{ $mailData['data']->date_operation?->format('d/m/Y') }}
    </p>

    <p>
        <strong>CLIENTE:</strong> {{ $mailData['data']->client?->social_reason }}
    </p>

    <p>
        <strong>PILOTO:</strong> {{ $mailData['data']->userPilot?->name . ' ' . $mailData['data']->userPilot?->lastname }}
    </p>

    <p>
        <strong>TIPO DE APLICACION:</strong> {{ $mailData['data']->product?->name }}
    </p>

    <p>
        <strong>OBSERVACION:</strong> {{ $mailData['data']->observation?->observation_asistent_one }}
    </p>

</body>

</html>

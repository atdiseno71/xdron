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
        <strong>OPERACION NO:</strong> {{ $mailData['data']->id }}
    </p>

    <p>
        <strong>FECHA OPERACIÓN:</strong> {{ $mailData['data']->date_operation?->format('d/m/Y') }}
    </p>

    <p>
        <strong>CLIENTE:</strong> {{ $mailData['data']->client?->social_reason }}
    </p>

    <p>
        @if ($mailData['data']->assistant_two != null)
            <strong>TANQUEADOR 1:</strong><br>
            {{ $mailData['data']->assistant_one?->name . ' ' . $mailData['data']->assistant_one?->lastname }}<br>
            <strong>TANQUEADOR 2:</strong><br>
            {{ $mailData['data']->assistant_two?->name . ' ' . $mailData['data']->assistant_two?->lastname }}
        @else
            <strong>TANQUEADOR 1:</strong><br>
            {{ $mailData['data']->assistant_one?->name . ' ' . $mailData['data']->assistant_one?->lastname }}
        @endif
    </p>

    <p>
        <strong>TIPO DE APLICACION:</strong> {{ $mailData['data']->product?->name }}
    </p>

    <p>
        <strong>OBSERVACION:</strong> {{ $mailData['data']->observation?->observation_admin }}
    </p>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send email</title>
</head>

<body>
    <p>Hola, <strong>{{ $mailData['assistant']->name }}</strong>,<br><br> 
        Ha recibido una notificación de una operación, <strong>Fecha:</strong> {{ $mailData['data']->created_at?->format('d/m/Y') }}<br><br>
        para la operación #{{ $mailData['data']->id }}, para el cliente {{ $mailData['data']->client?->social_reason }}<br><br>
        El piloto que acompañaras será <strong>{{ $mailData['data']->userPilot?->name }}</strong>
        <br><br>
    </p>

</body>

</html>

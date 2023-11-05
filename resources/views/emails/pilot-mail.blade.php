<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send email</title>
</head>

<body>
    <p>Hola, <strong>{{ $mailData['data']->userPilot?->name }}</strong>,<br><br> 
        Ha recibido una notificación
        para la operación #{{ $mailData['data']->id }}, para el cliente {{ $mailData['data']->client?->social_reason }}<br><br>
        @if ($mailData['data']->assistant_two != null)
            <strong>Asistentes:</strong><br>
            {{ $mailData['data']->assistant_one?->name . ' ' . $mailData['data']->assistant_one?->lastname }} -
            {{ $mailData['data']->assistant_two?->name . ' ' . $mailData['data']->assistant_two?->lastname }}
        @else
            <strong>Asistente:</strong><br>
            {{ $mailData['data']->assistant_one?->name . ' ' . $mailData['data']->assistant_one?->lastname }}
        @endif
        <br><br>
        <strong>Fecha:</strong> {{ $mailData['data']->created_at?->format('d/m/Y') }}<br><br>
        Para confirmar haga click <a class="btn btn-sm btn-primary " href="{{ route('operation.accept', $mailData['data']->id) }}">aqui</a>
    </p>

</body>

</html>

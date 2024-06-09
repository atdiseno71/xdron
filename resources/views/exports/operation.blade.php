<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>FECHA VUELO</th>
            <th>PILOTO</th>
            <th>TANQUEADOR 1</th>
            <th>TANQUEADOR 2</th>
            <th>DRON</th>
            <th>CLIENTE</th>
            <th>T. APLICACION</th>
            <th>DESCARGA LTS</th>
            <th>T HECTAREAS</th>
            <th>HACIENDA</th>
            <th>SUERTE</th>
            <th>T BATERIAS</th>
            <th>TH VUELOS</th>
            <th>HECTAREAS/HORAS</th>
            <th>HECTAREAS/BATERIAS</th>
            <th>FECHA CREACIÓN</th>
            <th>ESTADO</th>
            <th>ADMINISTRADOR</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($operations as $key => $operation)
            @php
                $number_flights = $operation->number_flights;
                $hour_flights = $operation->hour_flights;
                $acres = 0;
                foreach ($operation->details as $detail) {
                    $acres += $detail->acres;
                }
                /* Hectareas/horas */
                if ($hour_flights != 0) {
                    $divide1 = number_format($acres / $hour_flights, 2, ',', ' ');
                } else {
                    $divide1 = 0;
                }
                /* Hectareas/Baterias */
                if ($number_flights != 0) {
                    $divide2 = number_format($acres / $number_flights, 2, ',', ' ');
                } else {
                    $divide2 = 0;
                }
            @endphp
            <tr>

                <td>{{ $operation->consecutive }}</td>
                <td>{{ $operation->date_operation }}</td>
                <td>{{ $operation->user_pilot?->name }}</td>
                <td>{{ $operation->assistant_one?->name }}</td>
                <td>{{ $operation->assistant_two?->name }}</td>
                <td>{{ $operation->drone->enrollment ?? 'Sin vuelos.' }}</td>
                <td>{{ $operation->client?->social_reason }}</td>
                <td>{{ $operation->product?->name }}</td>
                <td title="{{ $operation->download }}">{{ $operation->download }}</td>

                @php
                    // nombres de las haciendas
                    $names_states = '';
                    $names_lucks = '';
                    foreach ($operation->details as $index => $detail) {
                        $names_states .= $detail->estate?->name;
                        $names_lucks .= $detail->luck;
                        if (!$loop->last) {
                            $names_states .= ', ';
                            $names_lucks .= ', ';
                        }
                    }
                @endphp

                <td>{{ $acres }}</td>
                <td title="{{ $names_states }}">
                    {{ $names_states }}
                </td>
                <td title="{{ $names_lucks }}">
                    {{ $names_lucks }}
                </td>

                <td>{{ $number_flights }}</td>
                <td>{{ $hour_flights }}</td>

                <td>{{ $divide1 }}</td>
                <td>{{ $divide2 }}</td>

                <td>{{ $operation->created_at }}</td>
                <td>{{ $operation->status?->name ?? 'Sin vuelos.' }}</td>

                <td>{{ $operation->user_admin?->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

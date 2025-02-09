<table class="table_3 table-striped table-hover" cellspacing="0" width="100%" style="font-size: .7rem">
    <thead class="thead" style="text-transform: uppercase;">
        <tr>

            <th>No</th>
            <th>Fecha Aplic</th>
            <th>Piloto</th>
            <th>TANQ</th>
            <th>TANQ 2</th>
            <th>Dron</th>
            <th>Cliente</th>
            <th>T. Aplic</th>
            <th>Desc LTS</th>

            <th>Tot Has</th>
            <th>Hda</th>
            <th>Ste</th>

            <th>Tot Bat/Vls</th>
            <th>Tot Hrs</th>

            <th>Has/hrs</th>
            <th>Has/bat</th>

            <th>Fecha prog</th>
            <th>Estado</th>
            <th>Administrador</th>
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

                // Datos para las tablas
                $date_operation = $operation->date_operation?->format('d/m/Y');
                $name_pilot = $operation->user_pilot?->name;
                $name_assistant_one = $operation->assistant_one?->name;
                $name_assistant_two = $operation->assistant_two?->name;
                $drone_enrollment = $operation->drone->enrollment ?? 'Sin vuelos.';
                $client_name = $operation->client?->social_reason;
                $product_name = $operation->product?->name;
                $download = $operation->download;
            @endphp
            <tr>

                <td>{{ $operation->consecutive }}</td>

                <td title="{{ $date_operation }}">{{ $date_operation }}</td>
                <td title="{{ $name_pilot }}">{{ $name_pilot }}</td>
                <td title="{{ $name_assistant_one }}">{{ $name_assistant_one }}</td>
                <td title="{{ $name_assistant_two }}">{{ $name_assistant_two }}</td>
                <td title="{{ $drone_enrollment }}">{{ $drone_enrollment }}</td>
                <td title="{{ $client_name }}">{{ $client_name }}</td>
                <td title="{{ $product_name }}">{{ $product_name }}</td>
                <td title="{{ $download }}">{{ $download }}</td>

                <td title="{{ $acres }}">{{ $acres }}</td>
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

                <td>{{ $operation->created_at?->format('d/m/Y') }}</td>
                <td>{{ $operation->status?->name ?? 'Sin vuelos.' }}</td>

                <td>{{ $operation->userAdmin?->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>
    <!-- Modal -->
    <div class="modal fade" id="showOperation" tabindex="-1" role="dialog" aria-labelledby="operationShowLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="operationShowLabel">Registrar nueva suerte</h4>
                    <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Cerrar"
                        wire:click="$emitTo('operation-modal', 'close-modal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box box-info padding-1">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('id_cliente', 'Cliente') }}
                                        <input type="text" class="form-control" name="id_cliente" id="id_cliente" placeholder="Cliente registrado" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('pilot_id', 'Piloto') }}
                                        <input type="text" class="form-control" name="pilot_id" id="pilot_id" placeholder="Piloto registrado" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('assistant_id_one', 'Tanqueador 1') }}
                                        <input type="text" class="form-control" name="assistant_id_one" id="assistant_id_one" placeholder="Tanqueador 1 registrado" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('assistant_id_two', 'Tanqueador 2') }}
                                        <input type="text" class="form-control" name="assistant_id_two" id="assistant_id_two" placeholder="Tanqueador 2 registrado" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- File para el logo del proyecto -->
                                    <div class="form-group">
                                        <label for="input-logo">{{ __('Informe de lavado') }}:</label>
                                        <div class="card img-logo">
                                            <img id="evidence_record" src="{{ asset('images/default.png') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- File para el logo del proyecto -->
                                    <div class="form-group">
                                        <label for="input-logo">{{ __('Informe de operación') }}:</label>
                                        <div class="card img-logo">
                                            <img id="evidence_aplication" src="{{ asset('images/default.png') }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('dron_id', 'Drone') }}
                                        <input type="text" class="form-control" name="dron_id" id="dron_id" placeholder="Drone registrado" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('download', 'Descarga') }}
                                        <input type="text" class="form-control" name="download" id="download" placeholder="Descarga registrada" disabled>
                                    </div>
                                </div>
                                {{-- Termina columna 12 --}}
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('zone_id', 'Zona') }}
                                        <input type="text" class="form-control" name="zone_id" id="zone_id" placeholder="Zona registrada" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('number_flights', 'Baterias') }}
                                        <input type="text" class="form-control" name="number_flights" id="number_flights" placeholder="Baterias registradas" disabled>
                                    </div>
                                </div>
                                {{-- Termina columna 12 --}}
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('hour_flights', 'Horas vuelos') }}
                                        <input type="text" class="form-control" name="hour_flights" id="hour_flights" placeholder="Horas vuelos registradas" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('date_operation', 'Fecha vuelo') }}
                                        <input type="text" class="form-control" name="date_operation" id="date_operation" placeholder="Fecha vuelo registrada" disabled>
                                    </div>
                                </div>
                                {{-- Termina columna 12 --}}
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('observation_admin', 'Observaciones') }}
                                        <textarea class="form-control" placeholder="Observaciones" name="observation_admin" cols="50" rows="10" id="observation_admin" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('js')
    <script>
        window.addEventListener('show-modal', event => {
            $('#showOperation').modal('show');
            // Capturamos los datos de la operacion
            const operation = event.detail?.operation;
            // Llenamos los campos a mostrar
            $('#id_cliente').val(operation.client?.social_reason);
            $('#pilot_id').val(operation.user_pilot?.name);
            $('#assistant_id_one').val(operation.assistant_one?.name);
            $('#assistant_id_two').val(operation.assistant_two?.name);

            const evidence_record = $('#evidence_record');
            const evidence_aplication = $('#evidence_aplication');

            evidence_record.attr("src", operation.evidence_record);
            evidence_aplication.attr("src", operation.evidence_aplication);

            $('#dron_id').val(operation.drone?.enrollment);
            $('#download').val(operation.download);
            $('#zone_id').val(operation.zone?.name);
            $('#number_flights').val(operation.number_flights);
            $('#hour_flights').val(operation.hour_flights);
            $('#date_operation').val(operation.date_operation);

            const observations = `
                Observación para piloto: ${operation.observation?.observation_admin} \n
                Observación para tanqueadores: ${operation.observation?.observation_asistent_one}`;

            $('#observation_admin').val(observations);
        })

        window.addEventListener('hide-modal', () => {
            $('#showOperation').modal('hide');
        })
    </script>
@endsection

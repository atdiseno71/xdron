<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-12">
                {{-- Plantilla mensajes --}}
                @include('layouts.message')
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    {{ Form::label('type_product_id', 'Tipo producto') }}
                    {{ Form::select('type_product_id', $type_products, $operation->type_product_id, ['class' => 'form-control select2' . ($errors->has('type_product_id') ? ' is-invalid' : ''), 'id' => 'type_product_id', 'placeholder' => 'Seleccione el tipo de producto', 'disabled' => 'disabled']) }}
                    {!! $errors->first('type_product_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_cliente', 'Cliente') }}
                    {{ Form::select('id_cliente', $clients, $operation->id_cliente, ['class' => 'form-control select2' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'id' => 'id_cliente', 'placeholder' => 'Seleccione cliente', 'disabled' => 'disabled']) }}
                    {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('pilot_id', 'Piloto') }}
                    {{ Form::select('pilot_id', $pilots, $operation->pilot_id, ['class' => 'form-control select2' . ($errors->has('pilot_id') ? ' is-invalid' : ''), 'id' => 'pilot_id', 'placeholder' => 'Seleccione piloto', 'disabled' => 'disabled']) }}
                    {!! $errors->first('pilot_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('assistant_id_one', 'Asistente uno') }}
                    {{ Form::select('assistant_id_one', $assistents, $operation->assistant_id_one, ['class' => 'form-control select2' . ($errors->has('assistant_id_one') ? ' is-invalid' : ''), 'id' => 'assistant_id_one', 'placeholder' => 'Seleccione asistente uno', 'disabled' => 'disabled']) }}
                    {!! $errors->first('assistant_id_one', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('assistant_id_two', 'Asistente dos') }}
                    {{ Form::select('assistant_id_two', $assistents, $operation->assistant_id_two, ['class' => 'form-control select2' . ($errors->has('assistant_id_two') ? ' is-invalid' : ''), 'id' => 'assistant_id_two', 'placeholder' => 'Seleccione asistente dos', 'disabled' => 'disabled']) }}
                    {!! $errors->first('assistant_id_two', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <!-- Agrega un input hidden para rastrear el contador -->
        <input type="hidden" name="detalleCounter" id="detalleCounter" value="1">
        <!-- Contenedor donde todo se va a copiar -->
        <div class="row copy-detail-operation"></div>

        <!-- Recorremos los detalles guardados -->
        @forelse ($operation->details as $key => $detail)
            <!-- Contenerdor con campos del vuelo -->
            <div class="row detail-operation">
                <div class="col-12">
                    <hr class="lader-divider">
                    <br>
                    <h3 class="text-center fs-4 fw-bold">DETALLES DEL VUELO</h3>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="estate_id_{{ $key }}">Hacienda</label>
                        <select name="estate_id_{{ $key }}" id="estate_id_{{ $key }}"
                            class="form-control select2{{ $errors->has('estate_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una hacienda">
                            @foreach ($estates as $estateKey => $estateValue)
                                <option value="{{ $estateKey }}"
                                    {{ $detail->estate_id == $estateKey ? 'selected' : '' }}>
                                    {{ $estateValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('estate_id'))
                            <div class="invalid-feedback">{{ $errors->first('estate_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="luck_id_{{ $key }}">Suerte</label>
                        <select name="luck_id_{{ $key }}" id="luck_id_{{ $key }}"
                            class="form-control select2{{ $errors->has('luck_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una suerte">
                            @foreach ($lucks as $luckKey => $luckValue)
                                <option value="{{ $luckKey }}"
                                    {{ $detail->luck_id == $luckKey ? 'selected' : '' }}>
                                    {{ $luckValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('luck_id'))
                            <div class="invalid-feedback">{{ $errors->first('luck_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="download_{{ $key }}">Descarga</label>
                        <select name="download_{{ $key }}" id="download_{{ $key }}"
                            class="form-control select2{{ $errors->has('download') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una descarga">
                            @foreach ([5, 10, 15, 20] as $value)
                                <option value="{{ $value }}"
                                    {{ $detail->download == $value ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('download'))
                            <div class="invalid-feedback">{{ $errors->first('download') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="zone_id_{{ $key }}">Zona</label>
                        <select name="zone_id_{{ $key }}" id="zone_id_{{ $key }}"
                            class="form-control select2{{ $errors->has('zone_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una zona">
                            @foreach ($zones as $zoneKey => $zoneValue)
                                <option value="{{ $zoneKey }}"
                                    {{ $detail->zone_id == $zoneKey ? 'selected' : '' }}>
                                    {{ $zoneValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('zone_id'))
                            <div class="invalid-feedback">{{ $errors->first('zone_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="dron_id_{{ $key }}">Drones</label>
                        <select name="dron_id_{{ $key }}" id="dron_id_{{ $key }}"
                            class="form-control select2{{ $errors->has('dron_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una drone">
                            @foreach ($drones as $dronKey => $dronValue)
                                <option value="{{ $dronKey }}"
                                    {{ $detail->dron_id == $dronKey ? 'selected' : '' }}>
                                    {{ $dronValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('dron_id'))
                            <div class="invalid-feedback">{{ $errors->first('dron_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('number_flights__' . $key, 'Bacterias') }}
                        {{ Form::number('number_flights__' . $key, $detail->number_flights, ['class' => 'form-control' . ($errors->has('number_flights') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. bacterias']) }}
                        {!! $errors->first('number_flights', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('hour_flights__' . $key, 'Horas vuelos') }}
                        {{ Form::number('hour_flights__' . $key, $detail->hour_flights, ['class' => 'form-control' . ($errors->has('hour_flights') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. horas vuelos']) }}
                        {!! $errors->first('hour_flights', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('acres__' . $key, 'Hectareas') }}
                        {{ Form::number('acres__' . $key, $detail->acres, ['class' => 'form-control' . ($errors->has('acres') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. hectareas']) }}
                        {!! $errors->first('acres', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- File para el logo del proyecto -->
                    <div class="form-group">
                        <label for="input-logo">Evidencia de registro:</label>
                        <div class="card img-logo">
                            <input type="file" name="evidencia_record_{{ $key }}" class="input-img-logo"
                                id="evidencia_record_{{ $key }}"
                                value="{{ $detail->evidencia_record ?? 'images/img/default.png' }}"
                                data-preview-id="preview-record" onchange="previewFile(event)"
                                onchange="previewFile(event)" />
                            <img id="preview-record"
                                src="{{ asset($detail->evidencia_record ?? 'images/img/default.png') }}" />
                            <div class="icon-wrapper">
                                <i class="fa fa-upload fa-3x"></i>
                            </div>
                        </div>
                        {!! $errors->first('evidencia_record', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- File para el logo del proyecto -->
                    <div class="form-group">
                        <label for="input-logo">Evidencia track:</label>
                        <div class="card img-logo">
                            <input type="file" name="evidencia_track_{{ $key }}" class="input-img-logo"
                                id="evidencia_track_{{ $key }}"
                                value="{{ $detail->evidencia_track ?? 'images/img/default.png' }}"
                                data-preview-id="preview-track" onchange="previewFile(event)" />
                            <img id="preview-track"
                                src="{{ asset($detail->evidencia_track ?? 'images/img/default.png') }}" />
                            <div class="icon-wrapper">
                                <i class="fa fa-upload fa-3x"></i>
                            </div>
                        </div>
                        {!! $errors->first('evidencia_track', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- File para el logo del proyecto -->
                    <div class="form-group">
                        <label for="input-logo">Evidencia de gps:</label>
                        <div class="card img-logo">
                            <input type="file" name="evidencia_gps_{{ $key }}" class="input-img-logo" id="evidencia_gps_{{ $key }}"
                                value="{{ $detail->evidencia_gps ?? 'images/img/default.png' }}"
                                data-preview-id="preview-gps" onchange="previewFile(event)" />
                            <img id="preview-gps"
                                src="{{ asset($detail->evidencia_gps ?? 'images/img/default.png') }}" />
                            <div class="icon-wrapper">
                                <i class="fa fa-upload fa-3x"></i>
                            </div>
                        </div>
                        {!! $errors->first('evidencia_gps', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('observation_' . $key, 'Observaciones') }}
                        {{ Form::textArea('observation_' . $key, $detail->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese observaciones de la operacion']) }}
                        {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
        @empty
            <!-- Contenerdor con campos del vuelo -->
            <div class="row detail-operation">
                <div class="col-12">
                    <hr class="lader-divider">
                    <br>
                    <h3 class="text-center fs-4 fw-bold">DETALLES DEL VUELO</h3>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="estate_id_1">Hacienda</label>
                        <select name="estate_id_1" id="estate_id_1"
                            class="form-control select2{{ $errors->has('estate_id_1') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una hacienda">
                            @foreach ($estates as $estateKey => $estateValue)
                                <option value="{{ $estateKey }}"
                                    {{ $detail_operation->estate_id_1 == $estateKey ? 'selected' : '' }}>
                                    {{ $estateValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('estate_id_1'))
                            <div class="invalid-feedback">{{ $errors->first('estate_id_1') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="luck_id_1">Suerte</label>
                        <select name="luck_id_1" id="luck_id_1"
                            class="form-control select2{{ $errors->has('luck_id_1') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una suerte">
                            @foreach ($lucks as $luckKey => $luckValue)
                                <option value="{{ $luckKey }}"
                                    {{ $detail_operation->luck_id_1 == $luckKey ? 'selected' : '' }}>
                                    {{ $luckValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('luck_id_1'))
                            <div class="invalid-feedback">{{ $errors->first('luck_id_1') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="download_1">Descarga</label>
                        <select name="download_1" id="download_1"
                            class="form-control select2{{ $errors->has('download_1') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una descarga">
                            @foreach ([5, 10, 15, 20] as $value)
                                <option value="{{ $value }}"
                                    {{ $detail_operation->download_1 == $value ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('download_1'))
                            <div class="invalid-feedback">{{ $errors->first('download_1') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="zone_id_1">Zona</label>
                        <select name="zone_id_1" id="zone_id_1"
                            class="form-control select2{{ $errors->has('zone_id_1') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una zona">
                            @foreach ($zones as $zoneKey => $zoneValue)
                                <option value="{{ $zoneKey }}"
                                    {{ $detail_operation->zone_id_1 == $zoneKey ? 'selected' : '' }}>
                                    {{ $zoneValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('zone_id_1'))
                            <div class="invalid-feedback">{{ $errors->first('zone_id_1') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="dron_id_1">Drones</label>
                        <select name="dron_id_1" id="dron_id_1"
                            class="form-control select2{{ $errors->has('dron_id_1') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una drone">
                            @foreach ($drones as $dronKey => $dronValue)
                                <option value="{{ $dronKey }}"
                                    {{ $detail_operation->dron_id_1 == $dronKey ? 'selected' : '' }}>
                                    {{ $dronValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('dron_id_1'))
                            <div class="invalid-feedback">{{ $errors->first('dron_id_1') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('number_flights_1', 'Bacterias') }}
                        {{ Form::number('number_flights_1', $detail_operation->number_flights_1, ['class' => 'form-control' . ($errors->has('number_flights_1') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. bacterias']) }}
                        {!! $errors->first('number_flights_1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('hour_flights_1', 'Horas vuelos') }}
                        {{ Form::number('hour_flights_1', $detail_operation->hour_flights_1, ['class' => 'form-control' . ($errors->has('hour_flights_1') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. horas vuelos']) }}
                        {!! $errors->first('hour_flights_1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('acres_1', 'Hectareas') }}
                        {{ Form::number('acres_1', $detail_operation->acres_1, ['class' => 'form-control' . ($errors->has('acres_1') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. hectareas']) }}
                        {!! $errors->first('acres_1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- File para el logo del proyecto -->
                    <div class="form-group">
                        <label for="input-logo">Evidencia de registro:</label>
                        <div class="card img-logo">
                            <input type="file" name="evidencia_record_1" class="input-img-logo"
                                id="evidencia_record_1"
                                value="{{ $detail->evidencia_record_1 ?? 'images/img/default.png' }}"
                                data-preview-id="preview-record" onchange="previewFile(event)"
                                onchange="previewFile(event)" />
                            <img id="preview-record"
                                src="{{ asset($files_operation->evidencia_record_1 ?? 'images/img/default.png') }}" />
                            <div class="icon-wrapper">
                                <i class="fa fa-upload fa-3x"></i>
                            </div>
                        </div>
                        {!! $errors->first('icono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- File para el logo del proyecto -->
                    <div class="form-group">
                        <label for="input-logo">Evidencia track:</label>
                        <div class="card img-logo">
                            <input type="file" name="evidencia_track_1" class="input-img-logo"
                                id="evidencia_track_1"
                                value="{{ $files_operation->evidencia_track_1 ?? 'images/img/default.png' }}"
                                data-preview-id="preview-track" onchange="previewFile(event)" />
                            <img id="preview-track"
                                src="{{ asset($files_operation->evidencia_track_1 ?? 'images/img/default.png') }}" />
                            <div class="icon-wrapper">
                                <i class="fa fa-upload fa-3x"></i>
                            </div>
                        </div>
                        {!! $errors->first('icono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- File para el logo del proyecto -->
                    <div class="form-group">
                        <label for="input-logo">Evidencia de gps:</label>
                        <div class="card img-logo">
                            <input type="file" name="evidencia_gps_1" class="input-img-logo" id="evidencia_gps_1"
                                value="{{ $files_operation->evidencia_gps_1 ?? 'images/img/default.png' }}"
                                data-preview-id="preview-gps" onchange="previewFile(event)" />
                            <img id="preview-gps"
                                src="{{ asset($files_operation->evidencia_gps_1 ?? 'images/img/default.png') }}" />
                            <div class="icon-wrapper">
                                <i class="fa fa-upload fa-3x"></i>
                            </div>
                        </div>
                        {!! $errors->first('icono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('observation_1', 'Observaciones') }}
                        {{ Form::textArea('observation_1', $detail_operation->observation_1, ['class' => 'form-control' . ($errors->has('observation_1') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese observaciones de la operacion']) }}
                        {!! $errors->first('observation_1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
        @endforelse
        <button type="button" class="btn btn-success btn-block duplicarDetalleOperacion"
            data-target=".detail-operation">
            <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z"
                    fill="#FCFCFC" />
                <path
                    d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z"
                    fill="#FCFCFC" />
            </svg>
        </button>
    </div>
    <br>
    @include('layouts.btn-submit')
    <script>
        // Preview de los files
        function previewFile(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var previewId = $(input).data('preview-id');
                var img = document.getElementById(previewId);
                img.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }
        // Copiar formulario despues de tocar el boton
        document.addEventListener('DOMContentLoaded', function() {
            // Manejador del botón para duplicar
            $(".duplicarDetalleOperacion").click(function() {
                // Clona el contenido de detail-operation
                var $clone = $(".detail-operation").clone();

                // Limpia los valores de los campos clonados y las imágenes
                $clone.find(":input").val("");
                $clone.find("img").attr('src', '{{ asset('images/img/default.png') }}');

                // Incrementa el contador y establece el nuevo sufijo
                var detalleCounter = parseInt($("#detalleCounter").val()) + 1;
                $("#detalleCounter").val(detalleCounter);

                // Actualiza los sufijos en los atributos 'name' y 'id' para cada campo clonado
                $clone.find(":input").each(function() {
                    var oldName = $(this).attr("name");
                    var oldId = $(this).attr("id");

                    if (oldName) {
                        // Reemplaza el sufijo con el nuevo número
                        var newName = oldName.replace(/_\d+$/, "_" + detalleCounter);
                        var newId = oldId.replace(/_\d+$/, "_" + detalleCounter);

                        $(this).attr("name", newName);
                        $(this).attr("id", newId);
                    }
                });

                // Agrega la copia al div copy-detail-operation
                $(".copy-detail-operation").append($clone);

                // Reinicializa Select2 en los selects clonados
                $clone.find('select.select2').select2();
            });
        });
    </script>
</div>
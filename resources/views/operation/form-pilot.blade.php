<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-12">
                {{-- Plantilla mensajes --}}
                @include('layouts.message')
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_cliente', 'Cliente') }}
                    {{ Form::select('id_cliente', $clients, $operation->id_cliente, ['class' => 'form-control ' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'id' => 'id_cliente', 'placeholder' => 'Seleccione cliente', 'disabled' => 'disabled']) }}
                    {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('pilot_id', 'Piloto') }}
                    {{ Form::select('pilot_id', $pilots, $operation->pilot_id, ['class' => 'form-control ' . ($errors->has('pilot_id') ? ' is-invalid' : ''), 'id' => 'pilot_id', 'placeholder' => 'Seleccione piloto', 'disabled' => 'disabled']) }}
                    {!! $errors->first('pilot_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('assistant_id_one', 'Asistente uno') }}
                    {{ Form::select('assistant_id_one', $assistents, $operation->assistant_id_one, ['class' => 'form-control ' . ($errors->has('assistant_id_one') ? ' is-invalid' : ''), 'id' => 'assistant_id_one', 'placeholder' => 'Seleccione asistente uno', 'disabled' => 'disabled']) }}
                    {!! $errors->first('assistant_id_one', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('assistant_id_two', 'Asistente dos') }}
                    {{ Form::select('assistant_id_two', $assistents, $operation->assistant_id_two, ['class' => 'form-control ' . ($errors->has('assistant_id_two') ? ' is-invalid' : ''), 'id' => 'assistant_id_two', 'placeholder' => 'Seleccione asistente dos', 'disabled' => 'disabled']) }}
                    {!! $errors->first('assistant_id_two', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <!-- Agrega un input hidden para rastrear el contador -->
        <input type="hidden" name="detalleCounter" id="detalleCounter" value="{{ count($operation->details) != 0 ? count($operation->details) : 1 }}">
        <!-- Contenedor donde todo se va a copiar -->
        <div class="row copy-detail-operation"></div>

        <!-- Recorremos los detalles guardados -->
        @forelse ($operation->details as $key => $detail)
            <!-- Contenerdor con campos del vuelo -->
            <div class="row detail-operation">
                <div class="col-12">
                    <hr class="lader-divider">
                    <br>
                    <h3 class="text-center fs-4 fw-bold">DETALLES DEL VUELO <strong id="number_{{ $key + 1 }}">#{{ $key + 1 }}</strong>({{ $detail->id }})</h3>
                </div>
                <input name="id_detail_operation_{{ $key + 1 }}" id="id_detail_operation_{{ $key + 1 }}" type="text" value="{{ $detail->id }}" hidden>
                <div class="col-12 col-md-11">
                    <div class="form-group">
                        <label for="type_product_id_{{ $key + 1 }}">Tipo producto</label>
                        <select name="type_product_id_{{ $key + 1 }}" id="type_product_id_{{ $key + 1 }}"
                            class="form-control {{ $errors->has('type_product_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione el tipo de producto">
                            <option value="0" selected>Selecciona una opcion</option>
                            @foreach ($type_products as $typeProductKey => $typeProductValue)
                                <option value="{{ $typeProductKey }}"
                                    {{ $detail->type_product_id == $typeProductKey ? 'selected' : '' }}>
                                    {{ $typeProductValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('type_product_id'))
                            <div class="invalid-feedback">{{ $errors->first('type_product_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-1">
                    <div class="form-group btn-modal">
                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#formTypeProduct">
                            <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z" fill="#FCFCFC"/>
                                <path d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z" fill="#FCFCFC"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="form-group">
                        <label for="estate_id_{{ $key + 1 }}">Hacienda</label>
                        <select name="estate_id_{{ $key + 1 }}" id="estate_id_{{ $key + 1 }}"
                            class="form-control estate-selector {{ $errors->has('estate_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una hacienda" data-key="{{ $key + 1 }}">
                            <option value="0" selected>Selecciona una opcion</option>
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
                <div class="col-12 col-md-1">
                    <div class="form-group btn-modal">
                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#formEstate">
                            <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z" fill="#FCFCFC"/>
                                <path d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z" fill="#FCFCFC"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('luck_' . $key + 1, 'Suerte') }}
                        {{ Form::text('luck_' . $key + 1, $detail->hour_flights, ['class' => 'form-control' . ($errors->has('luck') ? ' is-invalid' : ''), 'id' => 'luck_' . $key + 1, 'placeholder' => 'Ingrese la suerte']) }}
                        {!! $errors->first('luck_', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="form-group">
                        <label for="dron_id_{{ $key + 1 }}">Drones</label>
                        <select name="dron_id_{{ $key + 1 }}" id="dron_id_{{ $key + 1 }}"
                            class="form-control {{ $errors->has('dron_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una drone">
                            <option value="0" selected>Selecciona una opcion</option>
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
                <div class="col-12 col-md-1">
                    <div class="form-group btn-modal">
                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#formDron">
                            <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z" fill="#FCFCFC"/>
                                <path d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z" fill="#FCFCFC"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="download_{{ $key + 1 }}">Descarga</label>
                        <select name="download_{{ $key + 1 }}" id="download_{{ $key + 1 }}"
                            class="form-control {{ $errors->has('download') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una descarga">
                            {{-- <option value="0" selected>Selecciona una opcion</option> --}}
                            @foreach (["Selecciona una opcion", 5, 10, 15, 20] as $value)
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
                        <label for="zone_id_{{ $key + 1 }}">Zona</label>
                        <select name="zone_id_{{ $key + 1 }}" id="zone_id_{{ $key + 1 }}"
                            class="form-control {{ $errors->has('zone_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una zona">
                            <option value="0" selected>Selecciona una opcion</option>
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
                        {{ Form::label('number_flights_' . $key + 1, 'Baterias') }}
                        {{ Form::number('number_flights_' . $key + 1, $detail->number_flights, ['class' => 'form-control' . ($errors->has('number_flights') ? ' is-invalid' : ''), 'id' => 'number_flights_' . $key + 1, 'placeholder' => 'Ingrese cant. Baterias']) }}
                        {!! $errors->first('number_flights', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('hour_flights_' . $key + 1, 'Horas vuelos') }}
                        {{ Form::number('hour_flights_' . $key + 1, $detail->hour_flights, ['class' => 'form-control' . ($errors->has('hour_flights') ? ' is-invalid' : ''), 'id' => 'hour_flights_' . $key + 1, 'placeholder' => 'Ingrese cant. horas vuelos']) }}
                        {!! $errors->first('hour_flights', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('acres_' . $key + 1, 'Hectareas') }}
                        {{ Form::number('acres_' . $key + 1, $detail->acres, ['class' => 'form-control' . ($errors->has('acres') ? ' is-invalid' : ''), 'id' => 'acres_' . $key + 1, 'placeholder' => 'Ingrese cant. hectareas']) }}
                        {!! $errors->first('acres', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- File para el logo del proyecto -->
                    <div class="form-group">
                        <label for="input-logo">Evidencia de registro:</label>
                        <div class="card img-logo">
                            <input type="file" name="evidencia_record_{{ $key + 1 }}" class="input-img-logo"
                                id="evidencia_record_{{ $key + 1 }}"
                                value="{{ $detail->evidencia_record ?? 'images/img/default.png' }}"
                                data-preview-id="preview-record" onchange="previewFile(event)"
                                onchange="previewFile(event)" data-key="{{ $key + 1 }}"/>
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
                            <input type="file" name="evidencia_track_{{ $key + 1 }}" class="input-img-logo"
                                id="evidencia_track_{{ $key + 1 }}"
                                value="{{ $detail->evidencia_track ?? 'images/img/default.png' }}"
                                data-preview-id="preview-track" onchange="previewFile(event)" data-key="{{ $key + 1 }}"/>
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
                            <input type="file" name="evidencia_gps_{{ $key + 1 }}" class="input-img-logo" id="evidencia_gps_{{ $key + 1 }}"
                                value="{{ $detail->evidencia_gps ?? 'images/img/default.png' }}"
                                data-preview-id="preview-gps" onchange="previewFile(event)" data-key="{{ $key + 1 }}"/>
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
                        {{ Form::label('observation_' . $key + 1, 'Observaciones') }}
                        {{ Form::textArea('observation_' . $key + 1, $detail->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'id' => 'observation_' . $key + 1, 'placeholder' => 'Ingrese observaciones de la operacion']) }}
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
                    <h3 class="text-center fs-4 fw-bold">DETALLES DEL VUELO <strong id="number_1">#1</strong></h3>
                </div>
                <input name="id_detail_operation_1" id="id_detail_operation_1" type="text" value="0" hidden>
                <div class="col-12 col-md-5">
                    <div class="form-group">
                        <label for="type_product_id_1">Tipo producto</label>
                        <select name="type_product_id_1" id="type_product_id_1"
                            class="form-control {{ $errors->has('type_product_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione el tipo de producto">
                            <option value="0" selected>Selecciona una opcion</option>
                            @foreach ($type_products as $typeProductKey => $typeProductValue)
                                <option value="{{ $typeProductKey }}">
                                    {{ $typeProductValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('type_product_id'))
                            <div class="invalid-feedback">{{ $errors->first('type_product_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-1">
                    <div class="form-group btn-modal">
                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#formTypeProduct">
                            <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z" fill="#FCFCFC"/>
                                <path d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z" fill="#FCFCFC"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="form-group">
                        <label for="estate_id_1">Hacienda</label>
                        <select name="estate_id_1" id="estate_id_1"
                            class="form-control estate-selector {{ $errors->has('estate_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una hacienda" data-key="1">
                            <option value="0" selected>Selecciona una opcion</option>
                            @foreach ($estates as $estateKey => $estateValue)
                                <option value="{{ $estateKey }}">
                                    {{ $estateValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('estate_id'))
                            <div class="invalid-feedback">{{ $errors->first('estate_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-1">
                    <div class="form-group btn-modal">
                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#formEstate">
                            <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z" fill="#FCFCFC"/>
                                <path d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z" fill="#FCFCFC"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('luck_1', 'Suerte') }}
                        {{ Form::text('luck_1', $detail_operation->luck, ['class' => 'form-control' . ($errors->has('luck') ? ' is-invalid' : ''), 'id' => 'luck_1', 'placeholder' => 'Ingrese la suerte']) }}
                        {!! $errors->first('luck_', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="form-group">
                        <label for="dron_id_1">Drones</label>
                        <select name="dron_id_1" id="dron_id_1"
                            class="form-control {{ $errors->has('dron_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una drone">
                            <option value="0" selected>Selecciona una opcion</option>
                            @foreach ($drones as $dronKey => $dronValue)
                                <option value="{{ $dronKey }}">
                                    {{ $dronValue }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('dron_id'))
                            <div class="invalid-feedback">{{ $errors->first('dron_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-1">
                    <div class="form-group btn-modal">
                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#formDron">
                            <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z" fill="#FCFCFC"/>
                                <path d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z" fill="#FCFCFC"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="download_1">Descarga</label>
                        <select name="download_1" id="download_1"
                            class="form-control {{ $errors->has('download') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una descarga">
                            @foreach (["Selecciona una opcion", 5, 10, 15, 20] as $value)
                                <option value="{{ $value }}">
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
                        <label for="zone_id_1">Zona</label>
                        <select name="zone_id_1" id="zone_id_1"
                            class="form-control {{ $errors->has('zone_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una zona">
                            <option value="0" selected>Selecciona una opcion</option>
                            @foreach ($zones as $zoneKey => $zoneValue)
                                <option value="{{ $zoneKey }}">
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
                        {{ Form::label('number_flights_1', 'Baterias') }}
                        {{ Form::number('number_flights_1', $detail_operation->number_flights_1, ['class' => 'form-control' . ($errors->has('number_flights') ? ' is-invalid' : ''), 'id' => 'number_flights_1', 'placeholder' => 'Ingrese cant. Baterias']) }}
                        {!! $errors->first('number_flights', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('hour_flights_1', 'Horas vuelos') }}
                        {{ Form::number('hour_flights_1', $detail_operation->hour_flights_1, ['class' => 'form-control' . ($errors->has('hour_flights_1') ? ' is-invalid' : ''), 'id' => 'hour_flights_1', 'placeholder' => 'Ingrese cant. horas vuelos']) }}
                        {!! $errors->first('hour_flights_1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('acres_1', 'Hectareas') }}
                        {{ Form::number('acres_1', $detail_operation->acres_1, ['class' => 'form-control' . ($errors->has('acres_1') ? ' is-invalid' : ''), 'id' => 'acres_1', 'placeholder' => 'Ingrese cant. hectareas']) }}
                        {!! $errors->first('acres_1', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6"></div>
                <div class="col-12 col-md-4">
                    <!-- File para el logo del proyecto -->
                    <div class="form-group">
                        <label for="input-logo">Evidencia de registro:</label>
                        <div class="card img-logo">
                            <input type="file" name="evidencia_record_1" class="input-img-logo"
                                id="evidencia_record_1"
                                value="{{ $detail_operation->evidencia_record_1 ?? 'images/img/default.png' }}"
                                data-preview-id="preview-record" onchange="previewFile(event)"
                                onchange="previewFile(event)" data-key="1"/>
                            <img id="preview-record"
                                src="{{ asset($detail_operation->evidencia_record_1 ?? 'images/img/default.png') }}" />
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
                                value="{{ $detail_operation->evidencia_track_1 ?? 'images/img/default.png' }}"
                                data-preview-id="preview-track" onchange="previewFile(event)" data-key="1"/>
                            <img id="preview-track"
                                src="{{ asset($detail_operation->evidencia_track_1 ?? 'images/img/default.png') }}" />
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
                                value="{{ $detail_operation->evidencia_gps_1 ?? 'images/img/default.png' }}"
                                data-preview-id="preview-gps" onchange="previewFile(event)" data-key="1"/>
                            <img id="preview-gps"
                                src="{{ asset($detail_operation->evidencia_gps_1 ?? 'images/img/default.png') }}" />
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
                        {{ Form::textArea('observation_1', $detail_operation->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'id' => 'observation_1', 'placeholder' => 'Ingrese observaciones de la operacion']) }}
                        {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
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
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializa el contador de data-key
            var keyCounter = 1;

            // Manejador del botón para duplicar
            $(".duplicarDetalleOperacion").click(function() {
                // Clona el contenido de detail-operation
                var $clone = $(".detail-operation").clone();

                // Limpia los valores de los campos clonados y las imágenes
                $clone.find(":input").val("");
                $clone.find("img").attr('src', "{{ asset('images/img/default.png') }}");

                // Incrementa el contador y establece el nuevo sufijo
                var detalleCounter = parseInt($("#detalleCounter").val()) + 1;
                $("#detalleCounter").val(detalleCounter);

                // Incrementa el contador y establece el nuevo sufijo en data-key
                keyCounter++;

                // Actualiza los sufijos en los atributos 'name' y 'id' para cada campo clonado
                $clone.find(":input").each(function() {
                    var oldName = $(this).attr("name");
                    var oldId = $(this).attr("id");

                    if (oldName) {
                        // Reemplaza el sufijo con el nuevo número
                        var newName = oldName.replace(/_\d+$/, "_" + keyCounter);
                        var newId = oldId.replace(/_\d+$/, "_" + keyCounter);

                        $(this).attr("data-key", keyCounter);
                        $(this).attr("name", newName);
                        $(this).attr("id", newId);
                    }
                });

                $clone.find("strong").each(function() {
                    var oldId = $(this).attr("id");

                    if (oldId) {
                        var newId = oldId.replace(/_\d+$/, "_" + keyCounter);
                        $(this).attr("id", newId);
                        $(this).html("#" + keyCounter);
                    }
                });

                // Agrega la copia al div copy-detail-operation
                $(".copy-detail-operation").append($clone);
            });
        });

    </script>
</div>

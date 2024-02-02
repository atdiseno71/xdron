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
        {{-- boton para duplicar --}}
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
        {{-- ESPACIO BASE PARA COPIAR --}}
        @php
            $areThere = count($operation->details) == 0 ? false : true;
            $numberAreThere = $areThere ? 11 : 1;
        @endphp
        <div id="detail-copy" class="{{ $areThere ? 'detail-copy-form' : '' }}"> <!-- Oculta el contenido en caso de haber registros -->
            <!-- Contenerdor con campos del vuelo -->
            <div class="row detail-principal">
                <div class="col-12">
                    <br>
                    <div class="row">
                        <div class="col-10">
                            <h3 class="text-center fs-4 fw-bold">DETALLES DEL VUELO <strong id="number_{{ $numberAreThere }}">#1</strong></h3>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-danger eliminarDetalleOperacion" type="button">X</button>
                            {{-- <button class="btn btn-danger btn-preview-image eliminarDetalleOperacion" type="button">X</button> --}}
                        </div>
                    </div>
                </div>
                <input name="id_detail_operation_{{ $numberAreThere }}" id="id_detail_operation_{{ $numberAreThere }}" type="text" value="0" hidden>
                <div class="col-12 col-md-5">
                    <div class="form-group">
                        <label for="estate_id_{{ $numberAreThere }}">Hacienda</label>
                        <select name="estate_id_{{ $numberAreThere }}" id="estate_id_{{ $numberAreThere }}"
                            class="form-control estate-selector {{ $errors->has('estate_id') ? ' is-invalid' : '' }}"
                            placeholder="Seleccione una hacienda" data-key="{{ $numberAreThere }}">
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
                        <label for="type_product_id_{{ $numberAreThere }}">Tipo producto</label>
                        <select name="type_product_id_{{ $numberAreThere }}" id="type_product_id_{{ $numberAreThere }}"
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
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('luck_' . $numberAreThere, 'Suerte') }}
                        {{ Form::text('luck_' . $numberAreThere, $detail_operation->luck, ['class' => 'form-control' . ($errors->has('luck') ? ' is-invalid' : ''), 'id' => 'luck_' . $numberAreThere, 'placeholder' => 'Ingrese la suerte']) }}
                        {!! $errors->first('luck_', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="dron_id_{{ $numberAreThere }}">Drones</label>
                        <select name="dron_id_{{ $numberAreThere }}" id="dron_id_{{ $numberAreThere }}"
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
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="download_{{ $numberAreThere }}">Descarga</label>
                        <select name="download_{{ $numberAreThere }}" id="download_{{ $numberAreThere }}"
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
                        <label for="zone_id_{{ $numberAreThere }}">Zona</label>
                        <select name="zone_id_{{ $numberAreThere }}" id="zone_id_{{ $numberAreThere }}"
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
                        {{ Form::label('number_flights_' . $numberAreThere, 'Baterias') }}
                        {{ Form::number('number_flights_' . $numberAreThere, $detail_operation->number_flights_1, ['class' => 'form-control' . ($errors->has('number_flights') ? ' is-invalid' : ''), 'id' => 'number_flights_' . $numberAreThere, 'placeholder' => 'Ingrese cant. Baterias']) }}
                        {!! $errors->first('number_flights', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('hour_flights_' . $numberAreThere, 'Horas vuelos') }}
                        {{ Form::number('hour_flights_' . $numberAreThere, $detail_operation->hour_flights_1, ['class' => 'form-control' . ($errors->has('hour_flights') ? ' is-invalid' : ''), 'id' => 'hour_flights_' . $numberAreThere, 'placeholder' => 'Ingrese cant. horas vuelos']) }}
                        {!! $errors->first('hour_flights', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('acres_'. $numberAreThere, 'Hectareas') }}
                        {{ Form::number('acres_'. $numberAreThere, $detail_operation->acres_1, ['class' => 'form-control' . ($errors->has('acres') ? ' is-invalid' : ''), 'id' => 'acres_' . $numberAreThere, 'placeholder' => 'Ingrese cant. hectareas']) }}
                        {!! $errors->first('acres', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6"></div>
                {{-- INICIO DE ESPACIO PARA IMAGEN --}}
                <div class="col-12 col-md-2"></div>
                <div class="col-12 col-md-8 section-evidence">
                    <div class="form-group">
                        {{ Form::label('files_' . $numberAreThere, 'Subir Evidencias (Máximo 7)') }}
                        <section id="multi-selector-uniq">
                            <input class="form-control" id="files_{{ $numberAreThere }}" name="files_{{ $numberAreThere }}[]" type="file" multiple accept="image/*">
                            <ul id="preview-files_{{ $numberAreThere }}"></ul>
                        </section>
                    </div>
                </div>
                <div class="col-12 col-md-2"></div>
                {{-- FIN DE ESPACIO PARA IMAGEN --}}
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('observation_' . $numberAreThere, 'Observaciones') }}
                        {{ Form::textArea('observation_' . $numberAreThere, $detail_operation->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'id' => 'observation_' . $numberAreThere, 'placeholder' => 'Ingrese observaciones de la operacion']) }}
                        {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Recorremos los detalles guardados -->
        <!-- Contenerdor con campos del vuelo -->
        <div class="detail-operation">
        @foreach ($operation->details as $key => $detail)
            <div class="row">
                <div class="col-12">
                    <br>
                    <h3 class="text-center fs-4 fw-bold">DETALLES DEL VUELO <strong id="number_{{ $key + 1 }}">#{{ $key + 1 }}</strong></h3>
                </div>
                <input name="id_detail_operation_{{ $key + 1 }}" id="id_detail_operation_{{ $key + 1 }}" type="text" value="{{ $detail->id }}" hidden>
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
                <div class="col-12 col-md-12">
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
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        {{ Form::label('luck_' . $key + 1, 'Suerte') }}
                        {{ Form::text('luck_' . $key + 1, $detail->luck, ['class' => 'form-control' . ($errors->has('luck') ? ' is-invalid' : ''), 'id' => 'luck_' . $key + 1, 'placeholder' => 'Ingrese la suerte']) }}
                        {!! $errors->first('luck_', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
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
                {{-- INICIO DE ESPACIO PARA IMAGEN --}}
                <div class="col-12 col-md-2"></div>
                <div class="col-12 col-md-8 section-evidence">
                    <div class="form-group">
                        <input type="text" name="files_evidence_delete_{{ $key + 1 }}" id="files_evidence_delete_{{ $key + 1 }}" value="" hidden>
                        {{ Form::label('files_' . $key + 1, 'Subir Evidencias (Máximo 7)') }}
                        <section id="multi-selector-uniq">
                            <input class="form-control" id="files_{{ $key + 1 }}" name="files_{{ $key + 1 }}[]" type="file" multiple accept="image/*">
                            <ul id="preview-files_{{ $key + 1 }}"></ul>
                        </section>
                        <section id="multi-selector-uniq-load">
                            <ul id="preview-files-load">
                                @forelse ($detail->files_details as $files_evidence)
                                    <li class="section-evidence-preview">
                                        <img src="{{ asset($files_evidence->src_file) }}" width="80%" height="100px">
                                        <button class="btn btn-danger btn-preview-image" type="button" data-key="{{ $key + 1 }}" data-src="{{ $files_evidence->src_file }}">X</button>
                                    </li>
                                @empty
                                    <p>No hay imagenes registradas.</p>
                                @endforelse
                            </ul>
                        </section>
                    </div>
                </div>
                <div class="col-12 col-md-2"></div>
                {{-- FIN DE ESPACIO PARA IMAGEN --}}
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('observation_' . $key + 1, 'Observaciones') }}
                        {{ Form::textArea('observation_' . $key + 1, $detail->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'id' => 'observation_' . $key + 1, 'placeholder' => 'Ingrese observaciones de la operacion']) }}
                        {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <!-- Contenedor donde todo se va a copiar -->
        <div class="row copy-detail-operation"></div>
    </div>
    <br>
    @include('layouts.btn-submit')
    <script>
        // V2 para duplicar el form de vuelos
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializa el contador de data-key
            var keyCounter = parseInt($("#detalleCounter").val());

            // Manejador del botón para duplicar
            $(".duplicarDetalleOperacion").click(function() {
                // Clona los elementos internos de detail-operation
                var $cloneContent = $("#detail-copy").children().clone();

                // Limpia los valores de los campos clonados y las imágenes
                $cloneContent.find(":input").val("");
                $cloneContent.find("img").attr('src', "{{ asset('images/img/default.png') }}");

                // Incrementa el contador y establece el nuevo sufijo
                var detalleCounter = parseInt($("#detalleCounter").val()) + 1;
                $("#detalleCounter").val(detalleCounter);

                // Incrementa el contador y establece el nuevo sufijo en data-key
                keyCounter++;

                // Actualiza los sufijos en los atributos 'name' y 'id' para cada campo clonado
                $cloneContent.find(":input").each(function() {
                    var oldName = $(this).attr("name");
                    var oldId = $(this).attr("id");

                    if (oldName) {
                        if (oldName.startsWith("files_")) var newName = "files_" + keyCounter + "[]";
                        else var newName = oldName.replace(/_\d+$/, "_" + keyCounter);
                        var newId = oldId.replace(/_\d+$/, "_" + keyCounter);

                            $(this).attr("data-key", keyCounter);
                            $(this).attr("name", newName);
                            $(this).attr("id", newId);
                    }
                });

                $cloneContent.find("strong").each(function() {
                    var oldId = $(this).attr("id");

                    if (oldId) {
                        var newId = oldId.replace(/_\d+$/, "_" + keyCounter);
                        $(this).attr("id", newId);
                        $(this).html("#" + keyCounter);
                    }
                });

                $cloneContent.find("ul").each(function() {
                    var oldId = $(this).attr("id");

                    if (oldId) {
                        var newId = oldId.replace(/_\d+$/, "_" + keyCounter);
                        $(this).attr("id", newId);
                    }
                });

                // Agrega el manejador de clic para el botón de eliminación
                $cloneContent.find(".eliminarDetalleOperacion").click(function() {
                    // Elimina la sección clonada al hacer clic en el botón de eliminación
                    $(this).closest(".detail-principal").remove();
                });

                // Agrega la copia al div copy-detail-operation
                $(".copy-detail-operation").append($cloneContent);

                // Importa el script dinámico
                var nameScriptFile = 'js/views/previews/multiple.image_' + keyCounter + '.js'; // Name file siguiente
                var scriptSrc = "{{ asset('') }}" + nameScriptFile;
                var scriptElement = document.createElement("script");
                scriptElement.src = scriptSrc;
                document.body.appendChild(scriptElement);

                Swal.fire({
                    icon: 'success',
                    title: '¡Se agregó exitosamente el vuelo!',
                    text: 'Al vuelo #' + keyCounter + ' puede continuar cargando la información',
                    timer: 2000,
                });

            });
        });
    </script>

    @forelse ($operation->details as $index => $detail)
        <script src="{{ asset('js/views/previews/multiple.image_' . $index + 1 . '.js') }}"></script>
    @empty
        <script src="{{ asset('js/views/previews/multiple.image_1.js') }}"></script>
    @endforelse

</div>

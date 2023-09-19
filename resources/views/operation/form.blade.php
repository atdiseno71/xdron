<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            {{-- <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('download', 'Descarga') }}
                    {{ Form::number('download', $operation->download, ['class' => 'form-control' . ($errors->has('download') ? ' is-invalid' : ''), 'step' => '0.5', 'placeholder' => 'Descarga']) }}
                    {!! $errors->first('download', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div> --}}

        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('type_product_id', 'Producto') }}
                    {{ Form::select('type_product_id', $products, $operation->type_product_id, ['class' => 'form-control select2' . ($errors->has('type_product_id') ? ' is-invalid' : ''), 'id' => 'type_product_id', 'placeholder' => 'Seleccione el tipo de producto']) }}
                    {!! $errors->first('type_product_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('assistant_id_one', 'Asistente uno') }}
                    {{ Form::select('assistant_id_one', $assistents, $operation->assistant_id_one, ['class' => 'form-control select2' . ($errors->has('assistant_id_one') ? ' is-invalid' : ''), 'id' => 'assistant_id_one', 'placeholder' => 'Seleccione asistente uno']) }}
                    {!! $errors->first('assistant_id_one', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('assistant_id_two', 'Asistente dos') }}
                    {{ Form::select('assistant_id_two', $assistents, $operation->assistant_id_two, ['class' => 'form-control select2' . ($errors->has('assistant_id_two') ? ' is-invalid' : ''), 'id' => 'assistant_id_two', 'placeholder' => 'Seleccione asistente dos']) }}
                    {!! $errors->first('assistant_id_two', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('pilot_id', 'Piloto') }}
                    {{ Form::select('pilot_id', $pilots, $operation->pilot_id, ['class' => 'form-control select2' . ($errors->has('pilot_id') ? ' is-invalid' : ''), 'id' => 'pilot_id', 'placeholder' => 'Seleccione piloto']) }}
                    {!! $errors->first('pilot_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_cliente', 'Cliente') }}
                    {{ Form::select('id_cliente', $clients, $operation->id_cliente, ['class' => 'form-control select2' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'id' => 'id_cliente', 'placeholder' => 'Seleccione cliente']) }}
                    {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            @if ($role_user == "root" || $role_user == "super.root")
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('observation_admin', 'Observaciones administrador') }}
                        {{ Form::textArea('observation_admin', $operation->observation_admin, ['class' => 'form-control' . ($errors->has('observation_admin') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                        {!! $errors->first('observation_admin', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            @endif
            {{--
            @if ($role_user == "piloto")
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('observation_pilot') }}
                        {{ Form::textArea('observation_pilot', $operation->observation_pilot, ['class' => 'form-control' . ($errors->has('observation_pilot') ? ' is-invalid' : ''), 'placeholder' => 'Observation Pilot']) }}
                        {!! $errors->first('observation_pilot', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            @endif

            @if ($role_user == "ayudante")
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('observation_assistant_one') }}
                        {{ Form::textArea('observation_assistant_one', $operation->observation_assistant_one, ['class' => 'form-control' . ($errors->has('observation_assistant_one') ? ' is-invalid' : ''), 'placeholder' => 'Observation Assistant One']) }}
                        {!! $errors->first('observation_assistant_one', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        {{ Form::label('observation_assistant_two') }}
                        {{ Form::textArea('observation_assistant_two', $operation->observation_assistant_two, ['class' => 'form-control' . ($errors->has('observation_assistant_two') ? ' is-invalid' : ''), 'placeholder' => 'Observation Assistant Two']) }}
                        {!! $errors->first('observation_assistant_two', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            @endif --}}
        </div>
        <div class="row">
            <div class="col-12">
                <hr class="lader-divider">
                <h3 class="text-center fs-4 fw-bold">DETALLES DEL VUELO</h3>
                <hr class="lader-divider">
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('estate_id', 'Hacienda') }}
                    {{ Form::select('estate_id', $estates, $detail_operation->estate_id, ['class' => 'form-control select2' . ($errors->has('estate_id') ? ' is-invalid' : ''), 'id' => 'estate_id', 'placeholder' => 'Seleccione una hacienda']) }}
                    {!! $errors->first('estate_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('luck_id', 'Suerte') }}
                    {{ Form::select('luck_id', $lucks, $detail_operation->luck_id, ['class' => 'form-control select2' . ($errors->has('luck_id') ? ' is-invalid' : ''), 'id' => 'luck_id', 'placeholder' => 'Seleccione una suerte']) }}
                    {!! $errors->first('luck_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('download', 'Descarga') }}
                    {{ Form::select('download', [5,10,15,20], $detail_operation->download, ['class' => 'form-control select2' . ($errors->has('download') ? ' is-invalid' : ''), 'id' => 'download', 'placeholder' => 'Seleccione una descarga']) }}
                    {!! $errors->first('download', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('zone_id', 'Zona') }}
                    {{ Form::select('zone_id', $zones, $detail_operation->zone_id, ['class' => 'form-control select2' . ($errors->has('zone_id') ? ' is-invalid' : ''), 'id' => 'zone_id', 'placeholder' => 'Seleccione una zona']) }}
                    {!! $errors->first('zone_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12">
                <hr class="lader-divider">
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('dron_id', 'Drones') }}
                    {{ Form::select('dron_id', $drones, $detail_operation->dron_id, ['class' => 'form-control select2' . ($errors->has('dron_id') ? ' is-invalid' : ''), 'id' => 'dron_id', 'placeholder' => 'Seleccione una drones']) }}
                    {!! $errors->first('dron_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('number_flights', 'Bacterias') }}
                    {{ Form::number('number_flights', $detail_operation->number_flights, ['class' => 'form-control' . ($errors->has('number_flights') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. bacterias']) }}
                    {!! $errors->first('number_flights', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    {{ Form::label('hour_flights', 'Horas vuelos') }}
                    {{ Form::number('hour_flights', $detail_operation->hour_flights, ['class' => 'form-control' . ($errors->has('hour_flights') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. horas vuelos']) }}
                    {!! $errors->first('hour_flights', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    {{ Form::label('acres', 'Hectareas') }}
                    {{ Form::number('acres', $detail_operation->acres, ['class' => 'form-control' . ($errors->has('acres') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. hectareas']) }}
                    {!! $errors->first('acres', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    {{ Form::label('observation', 'Hectareas') }}
                    {{ Form::number('observation', $detail_operation->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese cant. hectareas']) }}
                    {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <!-- File para el logo del proyecto -->
                <div class="form-group">
                    <label for="input-logo">Evidencia de registro:</label>
                    <div class="card img-logo">
                        <input type="file" name="evidencia_record" class="input-img-logo" id="input-record" value="{{$files_operation->evidencia_record ?? 'images/img/default.png'}}"  data-preview-id="preview-record" onchange="previewFile(event)" onchange="previewFile(event)"/>
                        <img id="preview-record" src="{{ asset($files_operation->evidencia_record ?? 'images/img/default.png') }}" />
                        <div class="icon-wrapper">
                            <i class="fa fa-upload fa-5x"></i>
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
                        <input type="file" name="evidencia_track" class="input-img-logo" id="input-track" value="{{$files_operation->evidencia_track ?? 'images/img/default.png'}}" data-preview-id="preview-track" onchange="previewFile(event)"/>
                        <img id="preview-track" src="{{ asset($files_operation->evidencia_track ?? 'images/img/default.png') }}" />
                        <div class="icon-wrapper">
                            <i class="fa fa-upload fa-5x"></i>
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
                        <input type="file" name="evidencia_gps" class="input-img-logo" id="input-gps" value="{{$files_operation->evidencia_gps ?? 'images/img/default.png'}}" data-preview-id="preview-gps" onchange="previewFile(event)"/>
                        <img id="preview-gps" src="{{ asset($files_operation->evidencia_gps ?? 'images/img/default.png') }}" />
                        <div class="icon-wrapper">
                            <i class="fa fa-upload fa-5x"></i>
                        </div>
                    </div>
                    {!! $errors->first('icono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group btn-modal">
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#formCliente">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z" fill="#FCFCFC"/>
                            <path d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z" fill="#FCFCFC"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.btn-submit')
    <script>
        function previewFile(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var previewId = $(input).data('preview-id');
                var img = document.getElementById(previewId);
                img.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }
        function loadFincas() {
            const clienteSelect = document.querySelector('#id_cliente');
            const fincaSelect = document.querySelector('#id_finca');

            const clienteId = clienteSelect.value;
            const url = "{{ route('get-fincas-by-cliente') }}?cliente_id=" + clienteId;

            fetch(url).then(response => response.json())
                .then(data => {
                    if (Array.isArray(data)) {
                        fincaSelect.innerHTML = '<option value="">Seleccione una finca</option>'; // Limpiar el select actual

                        data.forEach(finca => {
                            const option = document.createElement('option');
                            option.value = finca.id;
                            option.textContent = finca.name; // Ajusta el nombre del campo de acuerdo a tu modelo de finca
                            fincaSelect.appendChild(option);
                        });
                    } else {
                        console.error('El resultado del servidor no es un array:', data);
                    }
                })
                .catch(error => {
                    console.error('Error al obtener las fincas: ', error);
                });
        }
    </script>
</div>

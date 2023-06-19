<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_servicio', 'Servicio:') }}
                    {{ Form::select('id_servicio', $servicios, $operacion->id_servicio, ['class' => 'form-control select2' . ($errors->has('id_servicio') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un servicio']) }}
                    {!! $errors->first('id_servicio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_cliente', 'Cliente:') }}
                    {{ Form::select('id_cliente', $clientes, $operacion->id_cliente, ['class' => 'form-control select2' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un cliente']) }}
                    {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_finca', 'Finca:') }}
                    {{ Form::select('id_finca', $fincas, $operacion->id_finca, ['class' => 'form-control select2' . ($errors->has('id_finca') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una finca']) }}
                    {!! $errors->first('id_finca', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('zona_id', 'Zona:') }}
                    {{ Form::select('zona_id', $zonas, $operacion->zona_id, ['class' => 'form-control select2' . ($errors->has('zona_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una zona']) }}
                    {!! $errors->first('zona_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_piloto', 'Piloto:') }}
                    {{ Form::select('id_piloto', $pilotos, $operacion->id_piloto, ['class' => 'form-control select2' . ($errors->has('id_piloto') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un piloto']) }}
                    {!! $errors->first('id_piloto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('fecha_ejecucion', 'Fecha operación:') }}
                    {{ Form::date('fecha_ejecucion', $operacion->fecha_ejecucion, ['class' => 'form-control' . ($errors->has('fecha_ejecucion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ejecucion']) }}
                    {!! $errors->first('fecha_ejecucion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    {{ Form::label('descarga') }}
                    {{ Form::text('descarga', $operacion->descarga, ['class' => 'form-control' . ($errors->has('descarga') ? ' is-invalid' : ''), 'placeholder' => 'Descarga']) }}
                    {!! $errors->first('descarga', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <!-- File para el logo del proyecto -->
                <div class="form-group">
                    <label for="input-logo">Evidencia de registro:</label>
                    <div class="card img-logo">
                        <input type="file" name="evidencia_record" class="input-img-logo" id="input-icono" value="{{$operacion->evidencia_record ?? 'images/img/default.png'}}"/>
                        <img id="img-icono" src="{{asset($operacion->evidencia_record ?? 'images/img/default.png')}}" />
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
                        <input type="file" name="evidencia_track" class="input-img-logo" id="input-icono" value="{{$operacion->evidencia_track ?? 'images/img/default.png'}}"/>
                        <img id="img-icono" src="{{asset($operacion->evidencia_track ?? 'images/img/default.png')}}" />
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
                        <input type="file" name="evidencia_gps" class="input-img-logo" id="input-icono" value="{{$operacion->evidencia_gps ?? 'images/img/default.png'}}"/>
                        <img id="img-icono" src="{{asset($operacion->evidencia_gps ?? 'images/img/default.png')}}" />
                        <div class="icon-wrapper">
                            <i class="fa fa-upload fa-5x"></i>
                        </div>
                    </div>
                    {!! $errors->first('icono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::textArea('observaciones', $operacion->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

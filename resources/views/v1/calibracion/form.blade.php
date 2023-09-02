<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('id_cliente') }}
            {{ Form::text('id_cliente', $calibracion->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Id Cliente']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $calibracion->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo1') }}
            {{ Form::text('archivo1', $calibracion->archivo1, ['class' => 'form-control' . ($errors->has('archivo1') ? ' is-invalid' : ''), 'placeholder' => 'Archivo1']) }}
            {!! $errors->first('archivo1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion_piloto') }}
            {{ Form::text('observacion_piloto', $calibracion->observacion_piloto, ['class' => 'form-control' . ($errors->has('observacion_piloto') ? ' is-invalid' : ''), 'placeholder' => 'Observacion Piloto']) }}
            {!! $errors->first('observacion_piloto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion_cliente') }}
            {{ Form::text('observacion_cliente', $calibracion->observacion_cliente, ['class' => 'form-control' . ($errors->has('observacion_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Observacion Cliente']) }}
            {!! $errors->first('observacion_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo2') }}
            {{ Form::text('archivo2', $calibracion->archivo2, ['class' => 'form-control' . ($errors->has('archivo2') ? ' is-invalid' : ''), 'placeholder' => 'Archivo2']) }}
            {!! $errors->first('archivo2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo3') }}
            {{ Form::text('archivo3', $calibracion->archivo3, ['class' => 'form-control' . ($errors->has('archivo3') ? ' is-invalid' : ''), 'placeholder' => 'Archivo3']) }}
            {!! $errors->first('archivo3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $calibracion->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

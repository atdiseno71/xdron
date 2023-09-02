<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('id_cliente') }}
            {{ Form::text('id_cliente', $aplicacion->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Id Cliente']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_producto') }}
            {{ Form::text('id_producto', $aplicacion->id_producto, ['class' => 'form-control' . ($errors->has('id_producto') ? ' is-invalid' : ''), 'placeholder' => 'Id Producto']) }}
            {!! $errors->first('id_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('matricula') }}
            {{ Form::text('matricula', $aplicacion->matricula, ['class' => 'form-control' . ($errors->has('matricula') ? ' is-invalid' : ''), 'placeholder' => 'Matricula']) }}
            {!! $errors->first('matricula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $aplicacion->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_salida') }}
            {{ Form::text('hora_salida', $aplicacion->hora_salida, ['class' => 'form-control' . ($errors->has('hora_salida') ? ' is-invalid' : ''), 'placeholder' => 'Hora Salida']) }}
            {!! $errors->first('hora_salida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_llegada') }}
            {{ Form::text('hora_llegada', $aplicacion->hora_llegada, ['class' => 'form-control' . ($errors->has('hora_llegada') ? ' is-invalid' : ''), 'placeholder' => 'Hora Llegada']) }}
            {!! $errors->first('hora_llegada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('consumo_combustible') }}
            {{ Form::text('consumo_combustible', $aplicacion->consumo_combustible, ['class' => 'form-control' . ($errors->has('consumo_combustible') ? ' is-invalid' : ''), 'placeholder' => 'Consumo Combustible']) }}
            {!! $errors->first('consumo_combustible', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tanqueador') }}
            {{ Form::text('tanqueador', $aplicacion->tanqueador, ['class' => 'form-control' . ($errors->has('tanqueador') ? ' is-invalid' : ''), 'placeholder' => 'Tanqueador']) }}
            {!! $errors->first('tanqueador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horas_vuelo') }}
            {{ Form::text('horas_vuelo', $aplicacion->horas_vuelo, ['class' => 'form-control' . ($errors->has('horas_vuelo') ? ' is-invalid' : ''), 'placeholder' => 'Horas Vuelo']) }}
            {!! $errors->first('horas_vuelo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aterrizajes') }}
            {{ Form::text('aterrizajes', $aplicacion->aterrizajes, ['class' => 'form-control' . ($errors->has('aterrizajes') ? ' is-invalid' : ''), 'placeholder' => 'Aterrizajes']) }}
            {!! $errors->first('aterrizajes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hectareas') }}
            {{ Form::text('hectareas', $aplicacion->hectareas, ['class' => 'form-control' . ($errors->has('hectareas') ? ' is-invalid' : ''), 'placeholder' => 'Hectareas']) }}
            {!! $errors->first('hectareas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_aplicacion') }}
            {{ Form::text('archivo_aplicacion', $aplicacion->archivo_aplicacion, ['class' => 'form-control' . ($errors->has('archivo_aplicacion') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Aplicacion']) }}
            {!! $errors->first('archivo_aplicacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_track') }}
            {{ Form::text('archivo_track', $aplicacion->archivo_track, ['class' => 'form-control' . ($errors->has('archivo_track') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Track']) }}
            {!! $errors->first('archivo_track', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_record') }}
            {{ Form::text('archivo_record', $aplicacion->archivo_record, ['class' => 'form-control' . ($errors->has('archivo_record') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Record']) }}
            {!! $errors->first('archivo_record', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_mapa') }}
            {{ Form::text('archivo_mapa', $aplicacion->archivo_mapa, ['class' => 'form-control' . ($errors->has('archivo_mapa') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Mapa']) }}
            {!! $errors->first('archivo_mapa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('otro_archivo') }}
            {{ Form::text('otro_archivo', $aplicacion->otro_archivo, ['class' => 'form-control' . ($errors->has('otro_archivo') ? ' is-invalid' : ''), 'placeholder' => 'Otro Archivo']) }}
            {!! $errors->first('otro_archivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion_piloto') }}
            {{ Form::text('observacion_piloto', $aplicacion->observacion_piloto, ['class' => 'form-control' . ($errors->has('observacion_piloto') ? ' is-invalid' : ''), 'placeholder' => 'Observacion Piloto']) }}
            {!! $errors->first('observacion_piloto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion_cliente') }}
            {{ Form::text('observacion_cliente', $aplicacion->observacion_cliente, ['class' => 'form-control' . ($errors->has('observacion_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Observacion Cliente']) }}
            {!! $errors->first('observacion_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $aplicacion->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descarga') }}
            {{ Form::text('descarga', $aplicacion->descarga, ['class' => 'form-control' . ($errors->has('descarga') ? ' is-invalid' : ''), 'placeholder' => 'Descarga']) }}
            {!! $errors->first('descarga', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_app') }}
            {{ Form::text('tipo_app', $aplicacion->tipo_app, ['class' => 'form-control' . ($errors->has('tipo_app') ? ' is-invalid' : ''), 'placeholder' => 'Tipo App']) }}
            {!! $errors->first('tipo_app', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_factura') }}
            {{ Form::text('archivo_factura', $aplicacion->archivo_factura, ['class' => 'form-control' . ($errors->has('archivo_factura') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Factura']) }}
            {!! $errors->first('archivo_factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valor_factura') }}
            {{ Form::text('valor_factura', $aplicacion->valor_factura, ['class' => 'form-control' . ($errors->has('valor_factura') ? ' is-invalid' : ''), 'placeholder' => 'Valor Factura']) }}
            {!! $errors->first('valor_factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comprobante') }}
            {{ Form::text('comprobante', $aplicacion->comprobante, ['class' => 'form-control' . ($errors->has('comprobante') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante']) }}
            {!! $errors->first('comprobante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion_factura') }}
            {{ Form::text('observacion_factura', $aplicacion->observacion_factura, ['class' => 'form-control' . ($errors->has('observacion_factura') ? ' is-invalid' : ''), 'placeholder' => 'Observacion Factura']) }}
            {!! $errors->first('observacion_factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

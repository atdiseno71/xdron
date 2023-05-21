<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_servicio') }}
            {{ Form::text('id_servicio', $operacion->id_servicio, ['class' => 'form-control' . ($errors->has('id_servicio') ? ' is-invalid' : ''), 'placeholder' => 'Id Servicio']) }}
            {!! $errors->first('id_servicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descarga') }}
            {{ Form::text('descarga', $operacion->descarga, ['class' => 'form-control' . ($errors->has('descarga') ? ' is-invalid' : ''), 'placeholder' => 'Descarga']) }}
            {!! $errors->first('descarga', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_ejecucion') }}
            {{ Form::text('fecha_ejecucion', $operacion->fecha_ejecucion, ['class' => 'form-control' . ($errors->has('fecha_ejecucion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ejecucion']) }}
            {!! $errors->first('fecha_ejecucion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_cliente') }}
            {{ Form::text('id_cliente', $operacion->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Id Cliente']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_finca') }}
            {{ Form::text('id_finca', $operacion->id_finca, ['class' => 'form-control' . ($errors->has('id_finca') ? ' is-invalid' : ''), 'placeholder' => 'Id Finca']) }}
            {!! $errors->first('id_finca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('zona_id') }}
            {{ Form::text('zona_id', $operacion->zona_id, ['class' => 'form-control' . ($errors->has('zona_id') ? ' is-invalid' : ''), 'placeholder' => 'Zona Id']) }}
            {!! $errors->first('zona_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_piloto') }}
            {{ Form::text('id_piloto', $operacion->id_piloto, ['class' => 'form-control' . ($errors->has('id_piloto') ? ' is-invalid' : ''), 'placeholder' => 'Id Piloto']) }}
            {!! $errors->first('id_piloto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('evidencia_record') }}
            {{ Form::text('evidencia_record', $operacion->evidencia_record, ['class' => 'form-control' . ($errors->has('evidencia_record') ? ' is-invalid' : ''), 'placeholder' => 'Evidencia Record']) }}
            {!! $errors->first('evidencia_record', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('evidencia_track') }}
            {{ Form::text('evidencia_track', $operacion->evidencia_track, ['class' => 'form-control' . ($errors->has('evidencia_track') ? ' is-invalid' : ''), 'placeholder' => 'Evidencia Track']) }}
            {!! $errors->first('evidencia_track', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('evidencia_gps') }}
            {{ Form::text('evidencia_gps', $operacion->evidencia_gps, ['class' => 'form-control' . ($errors->has('evidencia_gps') ? ' is-invalid' : ''), 'placeholder' => 'Evidencia Gps']) }}
            {!! $errors->first('evidencia_gps', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $operacion->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $detalleServicio->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_inventario') }}
            {{ Form::text('id_inventario', $detalleServicio->id_inventario, ['class' => 'form-control' . ($errors->has('id_inventario') ? ' is-invalid' : ''), 'placeholder' => 'Id Inventario']) }}
            {!! $errors->first('id_inventario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_servicio') }}
            {{ Form::text('num_servicio', $detalleServicio->num_servicio, ['class' => 'form-control' . ($errors->has('num_servicio') ? ' is-invalid' : ''), 'placeholder' => 'Num Servicio']) }}
            {!! $errors->first('num_servicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $detalleServicio->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
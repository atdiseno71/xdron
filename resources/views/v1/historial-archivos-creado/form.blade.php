<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('directorio') }}
            {{ Form::text('directorio', $historialArchivosCreado->directorio, ['class' => 'form-control' . ($errors->has('directorio') ? ' is-invalid' : ''), 'placeholder' => 'Directorio']) }}
            {!! $errors->first('directorio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_archivo') }}
            {{ Form::text('nombre_archivo', $historialArchivosCreado->nombre_archivo, ['class' => 'form-control' . ($errors->has('nombre_archivo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Archivo']) }}
            {!! $errors->first('nombre_archivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $historialArchivosCreado->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_registro') }}
            {{ Form::text('fecha_registro', $historialArchivosCreado->fecha_registro, ['class' => 'form-control' . ($errors->has('fecha_registro') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Registro']) }}
            {!! $errors->first('fecha_registro', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
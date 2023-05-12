<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $operacion->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horas_voladas') }}
            {{ Form::text('horas_voladas', $operacion->horas_voladas, ['class' => 'form-control' . ($errors->has('horas_voladas') ? ' is-invalid' : ''), 'placeholder' => 'Horas Voladas']) }}
            {!! $errors->first('horas_voladas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('consumo_combustible') }}
            {{ Form::text('consumo_combustible', $operacion->consumo_combustible, ['class' => 'form-control' . ($errors->has('consumo_combustible') ? ' is-invalid' : ''), 'placeholder' => 'Consumo Combustible']) }}
            {!! $errors->first('consumo_combustible', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('motivo') }}
            {{ Form::text('motivo', $operacion->motivo, ['class' => 'form-control' . ($errors->has('motivo') ? ' is-invalid' : ''), 'placeholder' => 'Motivo']) }}
            {!! $errors->first('motivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aterrizajes') }}
            {{ Form::text('aterrizajes', $operacion->aterrizajes, ['class' => 'form-control' . ($errors->has('aterrizajes') ? ' is-invalid' : ''), 'placeholder' => 'Aterrizajes']) }}
            {!! $errors->first('aterrizajes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('matricula') }}
            {{ Form::text('matricula', $operacion->matricula, ['class' => 'form-control' . ($errors->has('matricula') ? ' is-invalid' : ''), 'placeholder' => 'Matricula']) }}
            {!! $errors->first('matricula', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
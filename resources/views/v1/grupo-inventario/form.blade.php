<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $grupoInventario->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuenta_puc') }}
            {{ Form::text('cuenta_puc', $grupoInventario->cuenta_puc, ['class' => 'form-control' . ($errors->has('cuenta_puc') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta Puc']) }}
            {!! $errors->first('cuenta_puc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', $zone->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observations', 'Observaciones') }}
            {{ Form::textArea('observations', $zone->observations, ['class' => 'form-control' . ($errors->has('observations') ? ' is-invalid' : ''), 'id' => 'observations', 'placeholder' => 'Ingrese observaciones']) }}
            {!! $errors->first('observations', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

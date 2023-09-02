<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('matricula') }}
            {{ Form::text('matricula', $avion->matricula, ['class' => 'form-control' . ($errors->has('matricula') ? ' is-invalid' : ''), 'placeholder' => 'Matricula']) }}
            {!! $errors->first('matricula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('marca') }}
            {{ Form::text('marca', $avion->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
            {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $avion->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ano') }}
            {{ Form::text('ano', $avion->ano, ['class' => 'form-control' . ($errors->has('ano') ? ' is-invalid' : ''), 'placeholder' => 'Ano']) }}
            {!! $errors->first('ano', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('serie') }}
            {{ Form::text('serie', $avion->serie, ['class' => 'form-control' . ($errors->has('serie') ? ' is-invalid' : ''), 'placeholder' => 'Serie']) }}
            {!! $errors->first('serie', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('motor') }}
            {{ Form::text('motor', $avion->motor, ['class' => 'form-control' . ($errors->has('motor') ? ' is-invalid' : ''), 'placeholder' => 'Motor']) }}
            {!! $errors->first('motor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horometro') }}
            {{ Form::text('horometro', $avion->horometro, ['class' => 'form-control' . ($errors->has('horometro') ? ' is-invalid' : ''), 'placeholder' => 'Horometro']) }}
            {!! $errors->first('horometro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('alas') }}
            {{ Form::text('alas', $avion->alas, ['class' => 'form-control' . ($errors->has('alas') ? ' is-invalid' : ''), 'placeholder' => 'Alas']) }}
            {!! $errors->first('alas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fuselage') }}
            {{ Form::text('fuselage', $avion->fuselage, ['class' => 'form-control' . ($errors->has('fuselage') ? ' is-invalid' : ''), 'placeholder' => 'Fuselage']) }}
            {!! $errors->first('fuselage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('helice') }}
            {{ Form::text('helice', $avion->helice, ['class' => 'form-control' . ($errors->has('helice') ? ' is-invalid' : ''), 'placeholder' => 'Helice']) }}
            {!! $errors->first('helice', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cola') }}
            {{ Form::text('cola', $avion->cola, ['class' => 'form-control' . ($errors->has('cola') ? ' is-invalid' : ''), 'placeholder' => 'Cola']) }}
            {!! $errors->first('cola', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_motor') }}
            {{ Form::text('hora_motor', $avion->hora_motor, ['class' => 'form-control' . ($errors->has('hora_motor') ? ' is-invalid' : ''), 'placeholder' => 'Hora Motor']) }}
            {!! $errors->first('hora_motor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('centro_costo') }}
            {{ Form::text('centro_costo', $avion->centro_costo, ['class' => 'form-control' . ($errors->has('centro_costo') ? ' is-invalid' : ''), 'placeholder' => 'Centro Costo']) }}
            {!! $errors->first('centro_costo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

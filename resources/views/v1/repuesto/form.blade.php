<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $repuesto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_proveedor') }}
            {{ Form::text('id_proveedor', $repuesto->id_proveedor, ['class' => 'form-control' . ($errors->has('id_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Id Proveedor']) }}
            {!! $errors->first('id_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_pn') }}
            {{ Form::text('id_pn', $repuesto->id_pn, ['class' => 'form-control' . ($errors->has('id_pn') ? ' is-invalid' : ''), 'placeholder' => 'Id Pn']) }}
            {!! $errors->first('id_pn', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_marca') }}
            {{ Form::text('id_marca', $repuesto->id_marca, ['class' => 'form-control' . ($errors->has('id_marca') ? ' is-invalid' : ''), 'placeholder' => 'Id Marca']) }}
            {!! $errors->first('id_marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

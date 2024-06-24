<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    {{ Form::label('name', 'Nombre') }}
                    {{ Form::text('name', $typeProduct->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un nombre']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('observations', 'Observaciones') }}
                    {{ Form::textArea('observations', $typeProduct->observations, ['class' => 'form-control' . ($errors->has('observations') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                    {!! $errors->first('observations', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.btn-submit')
</div>

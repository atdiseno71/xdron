<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Nombre:') }}
                    {{ Form::text('name', $finca->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese nombre de la finca']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.btn-submit')
</div>

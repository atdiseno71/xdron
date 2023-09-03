<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('enrollment', 'Matricula') }}
                    {{ Form::text('enrollment', $dron->enrollment, ['class' => 'form-control' . ($errors->has('enrollment') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la matricula']) }}
                    {!! $errors->first('enrollment', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('brand', 'Marca') }}
                    {{ Form::text('brand', $dron->brand, ['class' => 'form-control' . ($errors->has('brand') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la marca']) }}
                    {!! $errors->first('brand', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('model', 'Modelo') }}
                    {{ Form::text('model', $dron->model, ['class' => 'form-control' . ($errors->has('model') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el modelo']) }}
                    {!! $errors->first('model', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('year', 'Año') }}
                    {{ Form::text('year', $dron->year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el año']) }}
                    {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

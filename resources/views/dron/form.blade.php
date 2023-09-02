<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('enrollment') }}
            {{ Form::text('enrollment', $dron->enrollment, ['class' => 'form-control' . ($errors->has('enrollment') ? ' is-invalid' : ''), 'placeholder' => 'Enrollment']) }}
            {!! $errors->first('enrollment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('brand') }}
            {{ Form::text('brand', $dron->brand, ['class' => 'form-control' . ($errors->has('brand') ? ' is-invalid' : ''), 'placeholder' => 'Brand']) }}
            {!! $errors->first('brand', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('model') }}
            {{ Form::text('model', $dron->model, ['class' => 'form-control' . ($errors->has('model') ? ' is-invalid' : ''), 'placeholder' => 'Model']) }}
            {!! $errors->first('model', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('year') }}
            {{ Form::text('year', $dron->year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
            {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $dron->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('number_flights') }}
            {{ Form::text('number_flights', $detailOperation->number_flights, ['class' => 'form-control' . ($errors->has('number_flights') ? ' is-invalid' : ''), 'placeholder' => 'Number Flights']) }}
            {!! $errors->first('number_flights', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hour_flights') }}
            {{ Form::text('hour_flights', $detailOperation->hour_flights, ['class' => 'form-control' . ($errors->has('hour_flights') ? ' is-invalid' : ''), 'placeholder' => 'Hour Flights']) }}
            {!! $errors->first('hour_flights', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('acres') }}
            {{ Form::text('acres', $detailOperation->acres, ['class' => 'form-control' . ($errors->has('acres') ? ' is-invalid' : ''), 'placeholder' => 'Acres']) }}
            {!! $errors->first('acres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('download') }}
            {{ Form::text('download', $detailOperation->download, ['class' => 'form-control' . ($errors->has('download') ? ' is-invalid' : ''), 'placeholder' => 'Download']) }}
            {!! $errors->first('download', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $detailOperation->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observation') }}
            {{ Form::text('observation', $detailOperation->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'placeholder' => 'Observation']) }}
            {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estate_id') }}
            {{ Form::text('estate_id', $detailOperation->estate_id, ['class' => 'form-control' . ($errors->has('estate_id') ? ' is-invalid' : ''), 'placeholder' => 'Estate Id']) }}
            {!! $errors->first('estate_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('luck_id') }}
            {{ Form::text('luck_id', $detailOperation->luck_id, ['class' => 'form-control' . ($errors->has('luck_id') ? ' is-invalid' : ''), 'placeholder' => 'Luck Id']) }}
            {!! $errors->first('luck_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('zone_id') }}
            {{ Form::text('zone_id', $detailOperation->zone_id, ['class' => 'form-control' . ($errors->has('zone_id') ? ' is-invalid' : ''), 'placeholder' => 'Zone Id']) }}
            {!! $errors->first('zone_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

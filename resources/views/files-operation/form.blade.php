<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('record') }}
            {{ Form::text('record', $filesOperation->record, ['class' => 'form-control' . ($errors->has('record') ? ' is-invalid' : ''), 'placeholder' => 'Record']) }}
            {!! $errors->first('record', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('track') }}
            {{ Form::text('track', $filesOperation->track, ['class' => 'form-control' . ($errors->has('track') ? ' is-invalid' : ''), 'placeholder' => 'Track']) }}
            {!! $errors->first('track', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('map') }}
            {{ Form::text('map', $filesOperation->map, ['class' => 'form-control' . ($errors->has('map') ? ' is-invalid' : ''), 'placeholder' => 'Map']) }}
            {!! $errors->first('map', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('detail_operation_id') }}
            {{ Form::text('detail_operation_id', $filesOperation->detail_operation_id, ['class' => 'form-control' . ($errors->has('detail_operation_id') ? ' is-invalid' : ''), 'placeholder' => 'Detail Operation Id']) }}
            {!! $errors->first('detail_operation_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

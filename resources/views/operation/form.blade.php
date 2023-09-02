<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('download') }}
            {{ Form::text('download', $operation->download, ['class' => 'form-control' . ($errors->has('download') ? ' is-invalid' : ''), 'placeholder' => 'Download']) }}
            {!! $errors->first('download', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observation_admin') }}
            {{ Form::text('observation_admin', $operation->observation_admin, ['class' => 'form-control' . ($errors->has('observation_admin') ? ' is-invalid' : ''), 'placeholder' => 'Observation Admin']) }}
            {!! $errors->first('observation_admin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observation_pilot') }}
            {{ Form::text('observation_pilot', $operation->observation_pilot, ['class' => 'form-control' . ($errors->has('observation_pilot') ? ' is-invalid' : ''), 'placeholder' => 'Observation Pilot']) }}
            {!! $errors->first('observation_pilot', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observation_assistant_one') }}
            {{ Form::text('observation_assistant_one', $operation->observation_assistant_one, ['class' => 'form-control' . ($errors->has('observation_assistant_one') ? ' is-invalid' : ''), 'placeholder' => 'Observation Assistant One']) }}
            {!! $errors->first('observation_assistant_one', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observation_assistant_two') }}
            {{ Form::text('observation_assistant_two', $operation->observation_assistant_two, ['class' => 'form-control' . ($errors->has('observation_assistant_two') ? ' is-invalid' : ''), 'placeholder' => 'Observation Assistant Two']) }}
            {!! $errors->first('observation_assistant_two', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_product_id') }}
            {{ Form::text('type_product_id', $operation->type_product_id, ['class' => 'form-control' . ($errors->has('type_product_id') ? ' is-invalid' : ''), 'placeholder' => 'Type Product Id']) }}
            {!! $errors->first('type_product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('assistant_id_one') }}
            {{ Form::text('assistant_id_one', $operation->assistant_id_one, ['class' => 'form-control' . ($errors->has('assistant_id_one') ? ' is-invalid' : ''), 'placeholder' => 'Assistant Id One']) }}
            {!! $errors->first('assistant_id_one', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('assistant_id_two') }}
            {{ Form::text('assistant_id_two', $operation->assistant_id_two, ['class' => 'form-control' . ($errors->has('assistant_id_two') ? ' is-invalid' : ''), 'placeholder' => 'Assistant Id Two']) }}
            {!! $errors->first('assistant_id_two', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pilot_id') }}
            {{ Form::text('pilot_id', $operation->pilot_id, ['class' => 'form-control' . ($errors->has('pilot_id') ? ' is-invalid' : ''), 'placeholder' => 'Pilot Id']) }}
            {!! $errors->first('pilot_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_cliente') }}
            {{ Form::text('id_cliente', $operation->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Id Cliente']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('admin_by') }}
            {{ Form::text('admin_by', $operation->admin_by, ['class' => 'form-control' . ($errors->has('admin_by') ? ' is-invalid' : ''), 'placeholder' => 'Admin By']) }}
            {!! $errors->first('admin_by', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_id') }}
            {{ Form::text('status_id', $operation->status_id, ['class' => 'form-control' . ($errors->has('status_id') ? ' is-invalid' : ''), 'placeholder' => 'Status Id']) }}
            {!! $errors->first('status_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

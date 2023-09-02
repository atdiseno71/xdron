<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nit') }}
            {{ Form::text('nit', $client->nit, ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''), 'placeholder' => 'Nit']) }}
            {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('social_reason') }}
            {{ Form::text('social_reason', $client->social_reason, ['class' => 'form-control' . ($errors->has('social_reason') ? ' is-invalid' : ''), 'placeholder' => 'Social Reason']) }}
            {!! $errors->first('social_reason', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('address') }}
            {{ Form::text('address', $client->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $client->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_enterprise') }}
            {{ Form::text('email_enterprise', $client->email_enterprise, ['class' => 'form-control' . ($errors->has('email_enterprise') ? ' is-invalid' : ''), 'placeholder' => 'Email Enterprise']) }}
            {!! $errors->first('email_enterprise', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_enterprise2') }}
            {{ Form::text('email_enterprise2', $client->email_enterprise2, ['class' => 'form-control' . ($errors->has('email_enterprise2') ? ' is-invalid' : ''), 'placeholder' => 'Email Enterprise2']) }}
            {!! $errors->first('email_enterprise2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email_user') }}
            {{ Form::text('email_user', $client->email_user, ['class' => 'form-control' . ($errors->has('email_user') ? ' is-invalid' : ''), 'placeholder' => 'Email User']) }}
            {!! $errors->first('email_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('full_name_user') }}
            {{ Form::text('full_name_user', $client->full_name_user, ['class' => 'form-control' . ($errors->has('full_name_user') ? ' is-invalid' : ''), 'placeholder' => 'Full Name User']) }}
            {!! $errors->first('full_name_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $client->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observations') }}
            {{ Form::text('observations', $client->observations, ['class' => 'form-control' . ($errors->has('observations') ? ' is-invalid' : ''), 'placeholder' => 'Observations']) }}
            {!! $errors->first('observations', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

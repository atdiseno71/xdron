<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('nit', 'NIT') }}
                    {{ Form::text('nit', $client->nit, ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''), 'placeholder' => 'Nit']) }}
                    {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('social_reason', 'Razón social') }}
                    {{ Form::text('social_reason', $client->social_reason, ['class' => 'form-control' . ($errors->has('social_reason') ? ' is-invalid' : ''), 'placeholder' => 'Social Reason']) }}
                    {!! $errors->first('social_reason', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('address', 'Dirección') }}
                    {{ Form::text('address', $client->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
                    {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('phone', 'Telefono') }}
                    {{ Form::text('phone', $client->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
                    {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('email_enterprise', 'Email de la empresa #1') }}
                    {{ Form::email('email_enterprise', $client->email_enterprise, ['class' => 'form-control' . ($errors->has('email_enterprise') ? ' is-invalid' : ''), 'placeholder' => 'Email Enterprise']) }}
                    {!! $errors->first('email_enterprise', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('email_enterprise2', 'Email de la empresa #2') }}
                    {{ Form::email('email_enterprise2', $client->email_enterprise2, ['class' => 'form-control' . ($errors->has('email_enterprise2') ? ' is-invalid' : ''), 'placeholder' => 'Email Enterprise2']) }}
                    {!! $errors->first('email_enterprise2', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('email_user', 'Email del usuario') }}
                    {{ Form::email('email_user', $client->email_user, ['class' => 'form-control' . ($errors->has('email_user') ? ' is-invalid' : ''), 'placeholder' => 'Email User']) }}
                    {!! $errors->first('email_user', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('full_name_user', 'Nombre completo') }}
                    {{ Form::text('full_name_user', $client->full_name_user, ['class' => 'form-control' . ($errors->has('full_name_user') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo del cliente']) }}
                    {!! $errors->first('full_name_user', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('observations', 'Observaciones') }}
                    {{ Form::textArea('observations', $client->observations, ['class' => 'form-control' . ($errors->has('observations') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                    {!! $errors->first('observations', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.btn-submit')
</div>

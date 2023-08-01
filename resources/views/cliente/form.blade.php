<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_finca', 'Finca') }}
                    @php
                        // Convertir el JSON en un arreglo de PHP
                        $selectedFincas = [];
                        if (!empty($cliente->clientesFincas)) {
                            $selectedFincas = json_decode($cliente->clientesFincas, true);
                            // Obtener los valores de 'id_finca' para el atributo 'value' del select
                            $selectedFincas = array_column($selectedFincas, 'id_finca');
                        }
                    @endphp
                    {{ Form::select('id_finca[]', $fincas, $selectedFincas, ['class' => 'form-control select2' . ($errors->has('id_finca') ? ' is-invalid' : ''), 'multiple' => 'multiple']) }}
                    {!! $errors->first('id_finca', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('nit') }}
                    {{ Form::text('nit', $user->document_number, ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''), 'readonly', 'placeholder' => 'Nit']) }}
                    {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $user->username, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'readonly', 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('email') }}
                    {{ Form::email('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'readonly', 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('contacto') }}
                    {{ Form::number('contacto', $cliente->contacto ?? '', ['class' => 'form-control' . ($errors->has('contacto') ? ' is-invalid' : ''), 'placeholder' => 'Contacto']) }}
                    {!! $errors->first('contacto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('direccion', 'Dirección') }}
                    {{ Form::text('direccion', $cliente->direccion ?? '', ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Dirección']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('telefono', 'Teléfono ') }}
                    {{ Form::number('telefono', $cliente->telefono ?? '', ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono']) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('email_encargado', 'Email del encargado') }}
                    {{ Form::email('email_encargado', $cliente->email_encargado ?? '', ['class' => 'form-control' . ($errors->has('email_encargado') ? ' is-invalid' : ''), 'placeholder' => 'Email del encargado']) }}
                    {!! $errors->first('email_encargado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('email1', 'Email #1') }}
                    {{ Form::email('email1', $cliente->email1 ?? '', ['class' => 'form-control' . ($errors->has('email1') ? ' is-invalid' : ''), 'placeholder' => 'Email #1']) }}
                    {!! $errors->first('email1', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('email2', 'Email #2') }}
                    {{ Form::email('email2', $cliente->email2 ?? '', ['class' => 'form-control' . ($errors->has('email2') ? ' is-invalid' : ''), 'placeholder' => 'Email #2']) }}
                    {!! $errors->first('email2', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('email3', 'Email #3') }}
                    {{ Form::email('email3', $cliente->email3 ?? '', ['class' => 'form-control' . ($errors->has('email3') ? ' is-invalid' : ''), 'placeholder' => 'Email #3']) }}
                    {!! $errors->first('email3', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    {{ Form::label('observaciones') }}
                    {{ Form::textArea('observaciones', $cliente->observaciones ?? '', ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                    {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

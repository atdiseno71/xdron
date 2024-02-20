<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_role', 'Roles') }}
                    {{ Form::select('id_role', $roles, $user->id_role, ['class' => 'form-control select2' . ($errors->has('id_role') ? ' is-invalid' : ''), 'id' => 'id_role', 'wire:click' => 'console.log("demo")', 'placeholder' => 'Seleccione un rol']) }}
                    {!! $errors->first('id_role', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="form-group">
                    {{ Form::label('id_cliente', 'Clientes') }}
                    {{-- @php
                        // Convertir el JSON en un arreglo de PHP
                        $selectedClients = [];
                        if (!empty($user->clients)) {
                            foreach ($user->clients as $key => $value) {
                                $selectedClients = array_push($selectedClients, [$value->id => $value->full_name_user]);
                            }
                            // $selectedClients = json_decode($user->clients, true);
                            // Obtener los valores de 'id_cliente' para el atributo 'value' del select
                            // $selectedClients = array_column($selectedClients, 'id_cliente');
                        }
                    @endphp --}}
                    {{ Form::select('id_cliente[]', $clients, $selectedClients, ['class' => 'form-control select2' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'id' => 'id_cliente', 'placeholder' => 'Seleccione los clientes', 'multiple' => 'multiple']) }}
                    {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-1">
                <div class="form-group btn-modal">
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#formCliente">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z" fill="#FCFCFC"/>
                            <path d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z" fill="#FCFCFC"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_type_document', 'Tipo de documento') }}
                    {{ Form::select('id_type_document', $type_documents, $user->id_type_document, ['class' => 'form-control select2' . ($errors->has('id_type_document') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un tipo de documento']) }}
                    {!! $errors->first('id_type_document', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('phone', 'Número de telefono') }}
                    {{ Form::number('phone', $user->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Número de telefono']) }}
                    {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('document_number', 'Número documento / Contraseña') }}
                    {{ Form::text('document_number', $user->document_number, ['class' => 'form-control' . ($errors->has('document_number') ? ' is-invalid' : ''), 'placeholder' => 'Número documento']) }}
                    {!! $errors->first('document_number', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('name', 'Nombres') }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('lastname', 'Apellido de usuario') }}
                    {{ Form::text('lastname', $user->lastname, ['class' => 'form-control' . ($errors->has('lastname') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
                    {!! $errors->first('lastname', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('email', 'Correo electrónico / Login') }}
                    {{ Form::email('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            {{-- <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('username', 'Nombre de usuario') }}
                    {{ Form::text('username', $user->username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de usuario']) }}
                    {!! $errors->first('username', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div> --}}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

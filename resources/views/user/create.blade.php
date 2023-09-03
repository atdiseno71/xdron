@extends('layouts.app')

@section('template_title')
    Crear Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear usuario</span>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('users.index') }}"> Cancelar</a>
                        </div>
                    </div>
                    {{-- Plantilla mensajes --}}
                    @include('layouts.message')
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}" id="principalForm" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="formCliente" tabindex="-1" role="dialog" aria-labelledby="formClienteLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formClienteLabel">Registrar nuevo cliente</h4>
                        <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                    <div class="modal-body">
                        <!-- Aquí coloca el formulario del modal -->
                        <form method="POST" action="{{ route('clients.uploadClient') }}" role="form"
                            enctype="multipart/form-data" id="formClienteUser">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('nit', 'NIT') }}
                                                {{ Form::text('nit', '', ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''), 'placeholder' => 'Nit']) }}
                                                {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('social_reason', 'Razón social') }}
                                                {{ Form::text('social_reason', '', ['class' => 'form-control' . ($errors->has('social_reason') ? ' is-invalid' : ''), 'placeholder' => 'Social Reason']) }}
                                                {!! $errors->first('social_reason', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('address', 'Dirección') }}
                                                {{ Form::text('address', '', ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
                                                {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('phone', 'Telefono') }}
                                                {{ Form::text('phone', '', ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
                                                {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('email_enterprise', 'Email de la empresa #1') }}
                                                {{ Form::email('email_enterprise', '', ['class' => 'form-control' . ($errors->has('email_enterprise') ? ' is-invalid' : ''), 'placeholder' => 'Email Enterprise']) }}
                                                {!! $errors->first('email_enterprise', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('email_enterprise2', 'Email de la empresa #2') }}
                                                {{ Form::email('email_enterprise2', '', ['class' => 'form-control' . ($errors->has('email_enterprise2') ? ' is-invalid' : ''), 'placeholder' => 'Email Enterprise2']) }}
                                                {!! $errors->first('email_enterprise2', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('email_user', 'Email del usuario') }}
                                                {{ Form::email('email_user', '', ['class' => 'form-control' . ($errors->has('email_user') ? ' is-invalid' : ''), 'placeholder' => 'Email User']) }}
                                                {!! $errors->first('email_user', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('full_name_user', 'Nombre completo') }}
                                                {{ Form::text('full_name_user', '', ['class' => 'form-control' . ($errors->has('full_name_user') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo del cliente']) }}
                                                {!! $errors->first('full_name_user', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{ Form::label('observations', 'Observaciones') }}
                                                {{ Form::textArea('observations', '', ['class' => 'form-control' . ($errors->has('observations') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                                                {!! $errors->first('observations', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @include('layouts.btn-submit')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#formClienteUser').on('submit', function(e) {
                e.preventDefault(); // Evita el envío normal del formulario
                // Obtener la URL completa
                var urlCompleta = window.location.href;

                // Crear un objeto URL a partir de la URL completa
                var urlObjeto = new URL(urlCompleta);

                // Obtener la URL base
                var urlBase = urlObjeto.origin;

                // Envía el formulario a través de AJAX
                $.ajax({
                    type: 'POST',
                    url: urlBase + '/uploadClient',
                    data: $(this).serialize(), // Serializa el formulario
                    success: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro completado',
                            showConfirmButton: true,
                            // timer: 1500
                        })
                        // Seleccionar el botón de cierre por su ID
                        const botonCerrarModal = document.getElementById('closeModal');
                        // Simular un clic en el botón para cerrar el modal
                        botonCerrarModal.click();
                        // Recargar el select
                        onloadClients();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Revise que los campos esten llenos',
                                showConfirmButton: true,
                                // timer: 1500
                            })
                        } else {
                            // Otros códigos de error
                            console.error('Error:', xhr.status, xhr.statusText);
                        }
                    }
                });
            });
        });

        function onloadClients() {
            // Obtener la URL completa
            var urlCompleta = window.location.href;

            // Crear un objeto URL a partir de la URL completa
            var urlObjeto = new URL(urlCompleta);

            // Obtener la URL base
            var urlBase = urlObjeto.origin;

            // Recargar la lista de clientes desde el servidor
            $.ajax({
                type: 'GET',
                url: urlBase + '/getClients',
                success: function(response) {
                    if (response && typeof response === 'object') {
                        var selectElement = document.getElementById('id_cliente');
                        selectElement.innerHTML = ''; // Limpiar el contenido actual
                        // Iterar sobre las claves del objeto JSON
                        for (var key in response) {
                            if (response.hasOwnProperty(key)) {
                                var option = document.createElement('option');
                                option.value = key; // Utilizar la clave como valor
                                option.text = response[key]; // Utilizar el valor como texto
                                selectElement.appendChild(option);
                            }
                        }

                        // Volver a inicializar el plugin select2 (si lo estás utilizando)
                        $(selectElement).select2();
                    } else {
                        console.error('La respuesta del API no es un objeto JSON válido.');
                    }
                },
                error: function(xhr) {
                    // Manejar errores si es necesario
                    console.error('Error al obtener la lista de clientes:', xhr.status, xhr.statusText);
                }
            });
        }


        document.addEventListener('DOMContentLoaded', function() {
            // Tu código aquí se ejecutará después de que todo el HTML se haya cargado
            onloadClients();
        });
    </script>
@endsection

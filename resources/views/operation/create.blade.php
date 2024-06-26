@extends('layouts.app')

@section('title')
    Crear operacion
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span class="card-title">Crear operacion</span>
                            <span class="card-title"><strong>#{{ $consecutive }}</strong></span>
                            <a class="btn btn-danger" href="{{ route('operations.index') }}"> Volver</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('operations.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($role_user == 'root' || $role_user == 'super.root')
                                @livewire('form-admin', ['id_operation' => null])
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('modals.typeProduct')
        @include('modals.client')
        @include('modals.asistent')
    </section>
    @livewireScripts
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Formulario para cliente
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
                        /* Recargar pagina */
                        location.reload();
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
            // Formulario para Tanqueador
            $('#formAsistentUser').on('submit', function(e) {
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
                    url: urlBase + '/uploadAsistent',
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
                        const botonCerrarModal = document.getElementById('closeModalAsistent');
                        // Simular un clic en el botón para cerrar el modal
                        botonCerrarModal.click();
                        // Recargar el select
                        onloadAsistent();
                        /* Recargar pagina */
                        location.reload();
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
            // Formulario para tipos Tipo aplicación
            $('#formTypeProduct').on('submit', function(e) {
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
                    url: "{{ route('typeProduct.uploadTypeProduct') }}",
                    data: {
                        _token: "{{ csrf_token() }}", // Agrega el token CSRF aquí
                        $(this).serialize()
                    }, // Serializa el formulario
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
        // CARGAR CLIENTES
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
                        var selectElement = document.getElementById('cliente_id');
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
        // CARGAR Tanqueadores
        function onloadAsistents() {
            // Obtener la URL completa
            var urlCompleta = window.location.href;

            // Crear un objeto URL a partir de la URL completa
            var urlObjeto = new URL(urlCompleta);

            // Obtener la URL base
            var urlBase = urlObjeto.origin;

            // Recargar la lista de Tanqueadores desde el servidor
            $.ajax({
                type: 'GET',
                url: urlBase + '/getAsistents',
                success: function(response) {
                    if (response && typeof response === 'object') {
                        // Tanqueador dos
                        var selectElementOne = document.getElementById('assistant_id_one');
                        selectElementOne.innerHTML = ''; // Limpiar el contenido actual
                        // Iterar sobre las claves del objeto JSON
                        for (var key in response) {
                            if (response.hasOwnProperty(key)) {
                                var option = document.createElement('option');
                                option.value = key; // Utilizar la clave como valor
                                option.text = response[key]; // Utilizar el valor como texto
                                selectElementOne.appendChild(option);
                            }
                        }
                        // Tanqueador dos
                        var selectElementTwo = document.getElementById('assistant_id_two');
                        selectElementTwo.innerHTML = ''; // Limpiar el contenido actual
                        // Iterar sobre las claves del objeto JSON
                        for (var key in response) {
                            if (response.hasOwnProperty(key)) {
                                var option = document.createElement('option');
                                option.value = key; // Utilizar la clave como valor
                                option.text = response[key]; // Utilizar el valor como texto
                                selectElementTwo.appendChild(option);
                            }
                        }

                        // Volver a inicializar el plugin select2 (si lo estás utilizando)
                        $(selectElementOne).select2();
                        $(selectElementTwo).select2();
                    } else {
                        console.error('La respuesta del API no es un objeto JSON válido.');
                    }
                },
                error: function(xhr) {
                    // Manejar errores si es necesario
                    console.error('Error al obtener la lista de Tanqueadores:', xhr.status, xhr.statusText);
                }
            });
        }
        // CARGAR TIPOS PROUDUCTOS
        function onloadTypeProducts() {
            // Obtener la URL completa
            var urlCompleta = window.location.href;

            // Crear un objeto URL a partir de la URL completa
            var urlObjeto = new URL(urlCompleta);

            // Obtener la URL base
            var urlBase = urlObjeto.origin;

            // Recargar la lista de clientes desde el servidor
            $.ajax({
                type: 'GET',
                url: urlBase + '/getTypeProducts',
                success: function(response) {
                    if (response && typeof response === 'object') {
                        var selectElement = document.getElementById('type_id');
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
            // onloadClients();
            // onloadAsistents();
            // onloadTypeProducts();
        });
    </script>
@endsection

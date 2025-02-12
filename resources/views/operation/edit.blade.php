@extends('layouts.app')

@section('title')
    Actualizar operacion
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span class="card-title">Actualizar operacion</span>
                            <span class="card-title"><strong>#{{ $operation->consecutive }}</strong></span>
                            <a class="btn btn-danger" href="{{ route('operations.index') }}"> Volver</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('operations.update', $operation->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @if ($role_user == 'root' || $role_user == 'super.root')
                                @livewire('form-admin', ['id_operation' => $operation->id])
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <span class="separator-line"></span>
                                        <br>
                                    </div>
                                </div>
                            @endif
                            @livewire('form-pilot', ['id_operation' => $operation->id])
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('modals.typeProduct')
        @include('modals.client')
        @include('modals.asistent')
        @include('modals.estate')
    </section>
@endsection

@section('js')
    <script>
      $(document).ready(function() {

            function handleFileInputChange(inputSelector, imageSelector) {
               const inputElement = $(inputSelector);

               if (inputElement.length) {
                  inputElement.on('change', function(event) {
                        const file = event.target.files[0];
                        if (file) {
                           const reader = new FileReader();
                           reader.onload = function(e) {
                              $(imageSelector).attr('src', e.target.result);
                              console.log('Imagen cargada correctamente.');
                           };
                           reader.readAsDataURL(file);
                        }
                  });
               } else {
                  console.error(`Elemento con ID '${inputSelector}' no encontrado.`);
               }
            }

            // Cargar eventos de previsualizar imagenes
            handleFileInputChange('#input_evidence_record', '.icono_evidence_record');
            handleFileInputChange('#input_evidence_aplication', '.icono_evidence_aplication');

            console.log("Documento listo, configurando eventos...");

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
                        //location.reload();
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
                        onloadAsistents();
                        /* Recargar pagina */
                        //location.reload();
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
                var formData = $(this).serialize(); // Serializa el formulario

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'), // Obtiene la URL del formulario
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro completado',
                            showConfirmButton: true,
                        })
                        const botonCerrarModal = document.getElementById('closeModal');
                        botonCerrarModal.click();
                        // No es necesario recargar la vista, ya que no hay redirección
                        // Puedes actualizar la vista según tus necesidades con los datos devueltos (typeProduct)
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Revise que los campos estén llenos',
                                showConfirmButton: true,
                            })
                        } else {
                            console.error('Error:', xhr.status, xhr.statusText);
                        }
                    }
                });
            });

            // Formulario para las haciendas
            $(document).on('submit', '#form_Estate', function(e) {
                e.preventDefault(); // Detiene el envío normal del formulario
                // console.log("Formulario detectado y preventDefault() aplicado.");

                var url = $(this).attr('action'); // URL de la acción
                var formData = $(this).serialize(); // Serializa los datos

                // console.log("Enviando datos a:", url);
                // console.log("Datos enviados:", formData);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    success: function(response) {
                        console.log("Respuesta del servidor:", response);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro completado',
                            showConfirmButton: true,
                        });

                        // **Vaciar el formulario**
                        $('#form_Estate')[0].reset();

                        // Seleccionar el botón de cierre por su ID
                        const botonCerrarModal = document.getElementById('formEstate');
                        // Simular un clic en el botón para cerrar el modal
                        botonCerrarModal.click();

                        // Recargar los datos en la tabla o select si es necesario
                        onloadEstates();
                    },
                    error: function(xhr) {
                        console.log("Error en la petición:", xhr);
                        if (xhr.status === 422) {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Revise que los campos estén llenos',
                                showConfirmButton: true,
                            });
                        } else {
                            console.error('Error:', xhr.status, xhr.statusText);
                        }
                    }
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
                        console.error('Error al obtener la lista de clientes:', xhr.status, xhr
                            .statusText);
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
                        console.error('Error al obtener la lista de Tanqueadores:', xhr.status, xhr
                            .statusText);
                    }
                });
            }

            // Recargar la lista de las haciendas (Estates)
            function onloadEstates() {
                // Obtener la URL base
                var urlBase = window.location.origin;

                // Recargar la lista de haciendas desde el servidor
                $.ajax({
                    type: 'GET',
                    url: urlBase + '/getEstates', // Asegúrate que esta ruta exista en tu backend
                    success: function(response) {
                        if (response && typeof response === 'object') {
                            // Obtener todos los select con la clase `estate_id`
                            var selectElements = document.querySelectorAll('.estate_id');

                            selectElements.forEach(function(selectElement) {
                                selectElement.innerHTML = ''; // Limpiar el contenido actual

                                // Iterar sobre las claves del objeto JSON y agregar opciones
                                for (var key in response) {
                                    if (response.hasOwnProperty(key)) {
                                        var option = document.createElement('option');
                                        option.value = key;
                                        option.text = response[key];
                                        selectElement.appendChild(option);
                                    }
                                }

                                // Reinicializar Select2 si lo estás usando
                                $(selectElement).select2();
                            });
                        } else {
                            console.error('La respuesta del API no es un objeto JSON válido.');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error al obtener la lista de haciendas:', xhr.status, xhr
                            .statusText);
                    }
                });
            }

        });
    </script>
@endsection

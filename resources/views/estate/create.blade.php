@extends('layouts.app')

@section('title')
    Crear hacienda
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear hacienda</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estates.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('estate.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('modals.client')
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


        document.addEventListener('DOMContentLoaded', function() {
            // Tu código aquí se ejecutará después de que todo el HTML se haya cargado
            onloadClients();
        });
    </script>
@endsection

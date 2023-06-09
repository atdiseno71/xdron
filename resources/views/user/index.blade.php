@extends('layouts.app')

@section('template_title')
    Usuario
@endsection

@section('content')
    @livewire('index-users')
    @livewireScripts
@endsection

@section('js')

    <script>
        // Obtenemos todos los elementos de checkbox con la clase "form-check-input"
        var checkboxes = document.querySelectorAll('.form-check-input');

        // Escuchamos el evento de cambio en cada checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Obtenemos el formulario más cercano al checkbox
                var form = this.closest('form');
                // Enviamos el formulario
                form.submit();
            });
        });
    </script>

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>

@endsection

@extends('layouts.app')

@section('title')
    Operaciones
@endsection

@section('content')
    @livewire('index-operation')
    @livewireScripts
@endsection

@section('js')
    <script>
        console.log('demo');
        document.addEventListener('DOMContentLoaded', function () {
            const typeSelect = document.getElementById('typeSelect');
            const searchInput = document.querySelector('.type-search[data-search-input]');

            typeSelect.addEventListener('change', function () {
                searchInput.value = typeSelect.value;
            });
        });
    </script>
    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>
@endsection

@extends('layouts.app')

@section('title')
    Operaciones
@endsection

@section('content')
    @livewire('index-operation')
    @livewireScripts
@endsection

@section('js')
    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>
@endsection

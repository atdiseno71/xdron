@extends('layouts.app')

@section('css')
    <style>

    </style>
@endsection

@section('title')
    Operaciones
@endsection

@section('content')
    @livewire('index-operation')
    @livewireScripts
@endsection

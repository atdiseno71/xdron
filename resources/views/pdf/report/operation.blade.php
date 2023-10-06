@extends('layouts.app-pdf')

@section('title', 'Reporte de productos')

@section('content')
    @include('template.cabezote')

    @forelse ($operation->details as $key => $detail)
        <div class="img-evidencia_record">
            <img src="{{ $detail->evidencia_record }}">
        </div>
        <div class="img-evidencia_track">
            <img src="{{ $detail->evidencia_track }}">
        </div>
        <div class="img-evidencia_gps">
            <img src="{{ $detail->evidencia_gps }}">
        </div>
    @empty
        <p>No hay imagenes registratadas en la operación</p>
    @endforelse

@endsection

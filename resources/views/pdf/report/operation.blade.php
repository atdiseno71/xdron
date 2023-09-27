@extends('layouts.app-pdf')

@section('title', 'Reporte de productos')

@section('content')
    @include('template.cabezote')

    @forelse ($operation->details as $key => $detail)
        <div class="img-evidencia_record">
            <img src="{{ $detail->evidencia_record }}" width="940vw" height="480vh">
        </div>
        <div class="img-evidencia_track">
            <img src="{{ $detail->evidencia_track }}" width="940vw" height="550vh">
        </div>
        <div class="img-evidencia_gps">
            <img src="{{ $detail->evidencia_gps }}" width="940vw" height="550vh">
        </div>
    @empty
        <p>No hay imagenes registratadas en la operación</p>
    @endforelse

@endsection

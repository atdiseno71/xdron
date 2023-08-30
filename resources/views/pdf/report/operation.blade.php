@extends('layouts.app-pdf')

@section('title', 'Reporte de productos')

@section('content')
    @include('template.cabezote')

    <div class="img-evidencia_record">
        <img src="{{ $evidencia_record }}" width="940vw" height="480vh">
    </div>
    <div class="img-evidencia_track">
        <img src="{{ $evidencia_track }}" width="940vw" height="550vh">
    </div>
    <div class="img-evidencia_gps">
        <img src="{{ $evidencia_gps }}" width="940vw" height="550vh">
    </div>

@endsection

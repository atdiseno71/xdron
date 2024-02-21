@extends('layouts.app-pdf')

@section('title', 'Reporte de Tipo aplicación')

@section('content')
    {{-- @include('template.cabezote') --}}

    <header id="main-header">

        <a id="logo-header" href="#">
            <span class="site-name">INFORME OPERACION</span>
        </a>
    </header>

    <h5 class="alineacion-center title-report"><strong>Cliente:</strong><strong>{{ $operation->client?->social_reason ?? '' }}</strong></h5>

    <br><br>

    @forelse ($operation->details as $key => $detail)
        <div class="detail">
            <ul>
                <li>
                    <p>
                        <strong>Hacienda:</strong> {{ $detail->estate?->name }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <strong>Suerte:</strong> {{ $detail->luck }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <strong>Zona:</strong> {{ $detail->zone?->name }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <strong>Drone:</strong> {{ $detail->drone?->enrollment }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                        <strong>Fecha:</strong> {{ $operation->created_at?->format('Y-m-d') }}
                    </p>
                </li>
            </ul>
        </div>
        <br><br><br>
        {{-- <div class="container">
            @foreach ($detail->files_details as $file)
                <img class="img-evidencia" src="{{ $file->src_file }}">
            @endforeach
        </div> --}}
        <div class="container">
            <div class="image-grid">
                @foreach ($detail->files_details as $file)
                    <img class="img-evidencia" src="{{ $file->src_file }}">
                @endforeach
            </div>
        </div>
    @empty
        <p class="alineacion-center">No hay imagenes registratadas en la operación</p>
    @endforelse

@endsection

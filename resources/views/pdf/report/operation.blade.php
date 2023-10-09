@extends('layouts.app-pdf')

@section('title', 'Reporte de productos')

@section('content')
    {{-- @include('template.cabezote') --}}

    <header id="main-header">

        <a id="logo-header" href="#">
            <span class="site-name">XDRON</span>
            <span class="site-desc">{{ $operation->client?->social_reason ?? '' }} / {{ $operation->details[0]?->typeProduct?->name ?? '' }}</span>
        </a> <!-- / #logo-header -->

        {{-- <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav><!-- / nav --> --}}

    </header>

    @forelse ($operation->details as $key => $detail)
        <div class="detail">
            <ul>
                <li>
                    <p><strong>Hacienda:</strong> {{ $detail->estate?->name }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<strong>Suerte:</strong> {{ $detail->luck }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<strong>Zona:</strong> {{ $detail->zone?->name }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<strong>Drone:</strong> {{ $detail->drone?->enrollment }}</p>
                </li>
            </ul>
        </div>
        @foreach ($detail->files_details as $file)
            <img class="img-evidencia" src="{{ $file->src_file }}">
        @endforeach
    @empty
        <p>No hay imagenes registratadas en la operación</p>
    @endforelse

@endsection

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

    <h5 style="text-align: center"><strong>REPORTE GENERAL</strong></h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th class="alineacion-center">Baterias</th>
                <th class="alineacion-center">Horas vuelos</th>
                <th class="alineacion-center">Hectareas</th>
                <th class="alineacion-center">Vuelos</th>
            </tr>
        </thead>
        <tbody>
            <tr class="alineacion-center">
                @php
                    $number_flights = 0;
                    $hour_flights = 0;
                    $acres = 0;
                    foreach ($operation->details as $key => $detail) {
                        $number_flights += $detail->number_flights;
                        $hour_flights += $detail->hour_flights;
                        $acres += $detail->acres;
                    }
                @endphp
                <td>{{ $number_flights }}</td>
                <td>{{ $hour_flights }}</td>
                <td>{{ $acres }}</td>
                <td>{{ count($operation->details) }}</td>
            </tr>
        </tbody>
    </table>

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
        <p class="alineacion-center">No hay imagenes registratadas en la operación</p>
    @endforelse

@endsection

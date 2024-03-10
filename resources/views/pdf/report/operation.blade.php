@extends('layouts.app-pdf')

@section('title', 'Reporte de Tipo aplicación')

@section('content')
    {{-- @include('template.cabezote') --}}

    <header id="main-header">

        <a id="logo-header" href="#">
            <span class="site-name">INFORME OPERACION</span>
        </a>
    </header>

    <h5 class="alineacion-center title-report">
        <strong>CLIENTE:</strong>{{ $operation->client?->social_reason ?? '' }}
        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <strong>FECHA VUELO:</strong>{{ $operation->date_operation?->format('d/m/Y') }}
    </h5>

    <h5 class="alineacion-center title-fixe">
        <strong>PILOTO:</strong>{{ $operation->user_pilot?->name ?? '' }}
        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <strong>DRON:</strong>{{ $operation->drone?->enrollment ?? '' }}
        <br>
        <strong>TOTAL HAS:</strong>{{ $operation->client?->social_reason ?? '' }}
        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <strong>DESCARGA:</strong>{{ $operation->client?->social_reason ?? '' }}
        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <strong>ZONA:</strong>{{ $operation->zone?->name ?? '' }}
    </h5>

    <br>
    <br>
    <img class="evidence_record" src="{{ $operation->evidence_record }}" height="900px">
    <hr>

    @forelse ($operation->details as $key => $detail)
        <p class="detail-flight">
            <strong>HACIENDA:</strong> {{ $detail->estate?->name }}&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>SUERTE:</strong> {{ $detail->luck }}&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>HAS:</strong> {{ $detail->acres }}
        </p>
        @foreach ($detail->files_details as $keys => $file)
            <img class="img-detail" src="{{ $file->src_file }}" height="850px">
            {{-- Saltar pagina cuando saque todos los archivos --}}
            @if ((count($detail->files_details) - 1) != $keys)
                <hr>
            @endif
        @endforeach
        {{-- PARTE DE OBSERVACIONES DEL PILOTO --}}
        <p style="text-align: left; position: absolute; left: 8mm; right: 8mm; bottom: 0%">
            <strong>OBSERVACIONES:</strong> {{ $detail->observation }}
        </p>
        {{-- Saltar pagina cuando saque todos los archivos --}}
        @if ((count($operation->details) - 1) != $key)
            <hr>
        @endif
    @empty
        <p class="alineacion-center">No hay imagenes registratadas en la operación</p>
    @endforelse
    <hr>
    {{-- Mensaje de informe --}}
    <p class="detail-flight">
        <strong>INFORME DE LAVADO</strong>
    </p>
    {{-- Mostrar última evidencia --}}
    <img class="evidence_aplication" src="{{ $operation->evidence_aplication }}" height="900px">

@endsection

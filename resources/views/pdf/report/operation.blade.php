@extends('layouts.app-pdf')

@section('title', 'Reporte de Tipo aplicación')

@section('content')
    <main class="main_content">
        <header id="main-header">
            <a id="logo-header" href="#">
                <span class="site-name">INFORME OPERACION</span>
            </a>
            <strong class="consecutive">{{ $operation->consecutive }}</strong>
        </header>

        <h5 class="alineacion-center title-report">
            <strong>CLIENTE: {{ $operation->client ? $operation->client->social_reason : '' }}</strong>
            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <strong>FECHA VUELO: {{ optional($operation->date_operation)->format('d/m/Y') }}</strong>
        </h5>

        <h5 class="alineacion-center title-fixe">
            <strong>PILOTO: {{ $operation->user_pilot ? $operation->user_pilot->name : '' }}</strong>
            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <strong>DRON: {{ $operation->drone ? $operation->drone->enrollment : '' }}</strong>
            <br>
            <strong>TOTAL HAS: {{ $hectares }}</strong>
            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <strong>DESCARGA: {{ $operation->download }}</strong>
            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
            <strong>ZONA: {{ $operation->zone ? $operation->zone->name : '' }}</strong>
        </h5>

        <br>
        <br>
        <img class="evidence_record" src="{{ $operation->evidence_record }}" height="900px">
        <hr>

        @forelse ($operation->details as $key => $detail)
            <p class="detail-flight">
                <strong>HACIENDA: {{ $detail->estate ? $detail->estate->name : '' }}</strong>&nbsp;&nbsp;|&nbsp;&nbsp;
                <strong>SUERTE: {{ $detail->luck }}</strong>&nbsp;&nbsp;|&nbsp;&nbsp;
                <strong>HAS: {{ $detail->acres }}</strong>
            </p>
            <div class="container-demo">
                @foreach ($detail->files_details as $keys => $file)
                    <img class="img-detail" src="{{ $file->src_file }}">
                    {{-- Saltar pagina cuando saque todos los archivos --}}
                    {{-- @if ($loop->last)
                <hr>
            @endif --}}
                @endforeach
            </div>
            {{-- PARTE DE OBSERVACIONES DEL PILOTO --}}
            <p style="text-align: left; position: absolute; left: 8mm; right: 8mm; bottom: 0%">
                <strong>OBSERVACIONES: {{ $detail->observation }}</strong>
            </p>
            {{-- Saltar pagina cuando saque todos los archivos --}}
            {{-- @if ($loop->last)
                <hr>
            @endif --}}
        @empty
            <p class="alineacion-center">No hay imágenes registradas en la operación</p>
        @endforelse
        <hr>
        {{-- Mensaje de informe --}}
        <p class="detail-flight">
            <strong>INFORME DE LAVADO</strong>
        </p>
        {{-- Mostrar última evidencia --}}
        <img class="evidence_aplication" src="{{ $operation->evidence_aplication }}" height="900px">
    </main>
@endsection

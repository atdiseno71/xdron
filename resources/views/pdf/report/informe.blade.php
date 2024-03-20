<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Base Meta Tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    {{-- Title --}}
    <title>
        @yield('title', 'Reporte de Tipo aplicación')
    </title>
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    {{-- Custom Stylesheets --}}
    <link href="{{ asset('css/estilosinforme.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>

<body>
    <div class="container" id="container">
        {{-- begin:header del informe --}}
        <div class="title-main">
            <span class="title">Informe Operacion</span>
            <strong class="consecutive">{{ $operation->consecutive }}</strong>
            <h5 class="sub-title spacing">
                CLIENTE: {{ $operation->client ? $operation->client->social_reason : '' }} | FECHA VUELO:
                {{ optional($operation->date_operation)->format('d/m/Y') }}
                PILOTO: {{ $operation->user_pilot ? $operation->user_pilot->name : '' }} | DRON:
                {{ $operation->drone ? $operation->drone->enrollment : '' }}
                TOTAL HAS: {{ $hectares }} | DESCARGA: {{ $operation->download }}
            </h5>
        </div>
        <div class="container-evidence-fixe mt-3">
            <img class="evidence_record" src="{{ asset($operation->evidence_record) }}" height="650px">
        </div>
        {{-- end:header del informe --}}
        {{-- begin:vuelos --}}
        @forelse ($operation->details as $key => $detail)
            {{-- begin:Header por vuelo --}}
            <div class="title-content">
                <h3 class="sub-title">
                    HACIENDA: {{ $detail->estate ? $detail->estate->name : '' }} | SUERTE: {{ $detail->luck }} | HAS:
                    {{ $detail->acres }}
                </h3>
            </div>
            {{-- end:Header por vuelo --}}
            {{-- begin:evidencias --}}
            @forelse ($detail->files_details as $keys => $file)
                @if ($loop->last)
                    <div class="container-evidence-fixe mt-3">
                        <img class="evidence_detail" style="border: blue solid 5px;" src="{{ asset($file->src_file) }}" height="600px">
                    </div>
                @else
                    <div class="container-evidence-fixe mt-2">
                        <img class="evidence_detail" style="border: red solid 5px;" src="{{ asset($file->src_file) }}" height="700px">
                    </div>
                @endif
            @empty
                <p>No hay imágenes registrados en la operación</p>
            @endforelse
            {{-- end:evidencias --}}
            {{-- begin:observaciones vuelo --}}
            <p class="observation">
                <strong>OBSERVACIONES: {{ $detail->observation }}</strong>
            </p>
            {{-- end:observaciones vuelo --}}
        @empty
            <p>No hay vuelos registrados en la operación</p>
        @endforelse
        <span class="spacing"></span>
        {{-- end:vuelos --}}
        {{-- begin:footer del informe --}}
        <div class="title-footer">
            <span class="title">INFORME DE LAVADO</span>
        </div>
        <div class="container-evidence-fixe">
            <img class="evidence_record" src="{{ asset($operation->evidence_aplication) }}" height="650px">
        </div>
        {{-- end:footer del informe --}}
    </div>

    {{-- begin:btn guardar PDF --}}
    <a class="savepdf" id="savePdf">PDF</a>
    {{-- end:btn guardar PDF --}}

    <script>
        document.getElementById('savePdf').addEventListener('click', function() {
            const container = document.getElementById('container');

            html2pdf()
                .from(container)
                .set({
                    filename: 'Reporte-de-tipo-aplicacion.pdf',
                    html2canvas: {
                        scale: 1,
                        logging: true,
                        imageTimeout: 0,
                        useCORS: true
                    },
                    jsPDF: {
                        orientation: 'landscape',
                        format: 'a4',
                        pagesplit: true,
                        pagesPerSheet: 1
                    }
                })
                .save();
        });
    </script>

</body>

</html>

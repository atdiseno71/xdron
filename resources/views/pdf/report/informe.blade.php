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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"
        integrity="sha512-z8IYLHO8bTgFqj+yrPyIJnzBDf7DDhWwiEsk4sY+Oe6J2M+WQequeGS7qioI5vT6rXgVRb4K1UVQC5ER7MKzKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container">
        <div id="container-horizontal">
            {{-- begin:header del informe --}}
            <div class="title-main">
                {{-- begin:section 1 --}}
                <a href="{{ route('home.index') }}" class="navbar-brand {{ config('adminlte.classes_brand') }}">

                    {{-- Small brand logo --}}
                    <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
                        alt="{{ config('adminlte.logo_img_alt', 'AdminLTE') }}"
                        class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}"
                        style="opacity:.8">

                    {{-- Brand text --}}
                    <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
                        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                    </span>

                    {{-- Small brand logo --}}
                    <img src="{{ asset(config('adminlte.logo_img_other', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
                        alt="{{ config('adminlte.logo_img_alt_other', 'logo_img_alt_other') }}"
                        class="{{ config('adminlte.logo_img_class_other', 'brand-image img-circle elevation-3') }}"
                        style="opacity:.8">
                </a>
                <span class="title">Informe Operacion</span>
                <strong class="consecutive">{{ $operation->consecutive }}</strong>
                {{-- end:section 1 --}}
                {{-- begin:separador --}}
                <span class="separator-line"></span>
                {{-- end:separador --}}
                <ul class="detail">
                    <li>
                        <span class="detail-tile">FECHA VUELO:</span>
                        <span class="detail-subtile">{{ optional($operation->date_operation)->format('d/m/Y') }}</span>
                    </li>
                    <li>
                        <span class="detail-tile">CLIENTE:</span>
                        <span
                            class="detail-subtile">{{ $operation->client ? $operation->client->social_reason : '' }}</span>
                    </li>
                    <li>
                        <span class="detail-tile">PILOTO:</span>
                        <span
                            class="detail-subtile">{{ $operation->user_pilot ? $operation->user_pilot->name . ' ' . $operation->user_pilot->lastname : '' }}</span>
                    </li>
                    <li>
                        <span class="detail-tile">DRONE:</span>
                        <span
                            class="detail-subtile">{{ $operation->drone ? $operation->drone->enrollment : '' }}</span>
                    </li>
                    <li>
                        <span class="detail-tile">TIPO APLICACION:</span>
                        <span class="detail-subtile">{{ $operation->product ? $operation->product->name : '' }}</span>
                    </li>
                    <li>
                        <span class="detail-tile">TOTAL HAS:</span>
                        <span class="detail-subtile">{{ $hectares }}</span>
                    </li>
                    <li>
                        <span class="detail-tile">DESCARGA:</span>
                        <span class="detail-subtile">{{ $operation->download }}</span>
                    </li>
                </ul>
            </div>


            <div class="container-evidence-fixe mt-3">
                <img class="evidence_record" src="{{ asset($operation->evidence_record) }}" height="715px">
            </div>
            {{-- end:header del informe --}}
        </div>
        <div id="container-vertical">
            {{-- begin:vuelos --}}
            @forelse ($operation->details as $key => $detail)
                {{-- begin:Header por vuelo --}}
                <div class="title-content">
                    <h3 class="sub-title">
                        HACIENDA: {{ $detail->estate ? $detail->estate->name : '' }} | SUERTE: {{ $detail->luck }} |
                        HAS:
                        {{ $detail->acres }}
                    </h3>
                </div>
                {{-- end:Header por vuelo --}}
                {{-- begin:evidencias --}}
                @forelse ($detail->files_details as $keys => $file)
                    @if ($loop->last)
                        <div class="container-evidence-fixe mt-3">
                            <img class="evidence_detail" src="{{ asset($file->src_file) }}" height="600px">
                        </div>
                    @else
                        <div class="container-evidence-fixe mt-2">
                            <img class="evidence_detail" src="{{ asset($file->src_file) }}" height="700px">
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
    </div>

    {{-- begin:btn guardar PDF --}}
    <a class="savepdf" id="savePdf">PDF</a>
    {{-- end:btn guardar PDF --}}

    <script>
        /* document.getElementById('savePdf').addEventListener('click', function() {
                                        const container_horizontal = document.getElementById('container-horizontal');
                                        const container_vertical = document.getElementById('container-vertical');

                                        html2pdf()
                                            .from(container_horizontal)
                                            .set({
                                                filename: 'primera_parte.pdf',
                                                html2canvas: {
                                                    scale: 1,
                                                    logging: true,
                                                    imageTimeout: 0,
                                                    useCORS: true
                                                },
                                                jsPDF: {
                                                    orientation: 'l',
                                                    format: 'a4',
                                                    pagesplit: true,
                                                    pagesPerSheet: 1
                                                }
                                            })
                                            .save();

                                        html2pdf()
                                            .from(container_vertical)
                                            .set({
                                                filename: 'segunda_parte.pdf',
                                                html2canvas: {
                                                    scale: 1,
                                                    logging: true,
                                                    imageTimeout: 0,
                                                    useCORS: true
                                                },
                                                jsPDF: {
                                                    orientation: 'p',
                                                    format: 'a4',
                                                    pagesplit: true,
                                                    pagesPerSheet: 1
                                                }
                                            })
                                            .save();
                                    }); */
    </script>

    <script>
        document.getElementById('savePdf').addEventListener('click', async function() {

            const container_horizontal = document.getElementById('container-horizontal');
            const container_vertical = document.getElementById('container-vertical');

            // Función para generar el PDF y obtener el archivo en formato Uint8Array
            async function generatePDF(container, filename, orientation) {
                return await html2pdf()
                    .from(container)
                    .set({
                        filename: filename,
                        html2canvas: {
                            scale: 1,
                            logging: true,
                            imageTimeout: 0,
                            useCORS: true
                        },
                        jsPDF: {
                            orientation: orientation,
                            format: 'a4',
                            pagesplit: true,
                            pagesPerSheet: 1
                        }
                    })
                    .outputPdf('arraybuffer');
            }

            // Generar los archivos PDF por separado
            const primeraPartePDF = await generatePDF(container_horizontal, 'primera_parte.pdf', 'l');
            const segundaPartePDF = await generatePDF(container_vertical, 'segunda_parte.pdf', 'p');

            // Combinar los archivos PDF en uno solo
            const combinedPDF = await PDFLib.PDFDocument.create();
            const primeraParteDoc = await PDFLib.PDFDocument.load(primeraPartePDF);
            const segundaParteDoc = await PDFLib.PDFDocument.load(segundaPartePDF);

            const primeraPartePages = await combinedPDF.copyPages(primeraParteDoc, primeraParteDoc
                .getPageIndices());
            const segundaPartePages = await combinedPDF.copyPages(segundaParteDoc, segundaParteDoc
                .getPageIndices());

            primeraPartePages.forEach(page => combinedPDF.addPage(page));
            segundaPartePages.forEach(page => combinedPDF.addPage(page));

            // Guardar el PDF combinado
            const combinedPdfBytes = await combinedPDF.save();
            const blob = new Blob([combinedPdfBytes], {
                type: 'application/pdf'
            });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'combined_file.pdf';
            link.click();

        });
    </script>

</body>

</html>

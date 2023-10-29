@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    <style>
        .form-check-input:focus {
            border-color: #198754 !important;
            outline: 0 !important;
            box-shadow: 0 0 0 .25rem rgba(13, 253, 84, 0.09) !important;
        }
        .form-check-input:checked {
            background-color: #198754 !important;
            border-color: #198754 !important;
        }
        .form-switch .form-check-input:focus {
            --bs-form-switch-bg: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%280, 0, 0, 0.25%29'/%3e%3c/svg%3e") !important;
        }
        .brand-link {
            color: #fff !important;
            text-decoration: none !important;
        }
        .btn-modal {
            margin-top: 1.7rem !important;
        }

        .card {
            margin-top: 2rem !important;
        }

        .lader-divider {
            background: #000;
            height: 1px;
            margin: var(--bs-dropdown-divider-margin-y) 0;
            overflow: hidden;
            border-top: 3px solid var(--bs-dropdown-divider-bg);
            opacity: .5;
        }

        .detail-copy-form {
            display: none; Oculta todo el contenido dentro del div
        }
        .section-evidence {
            text-align: center;
            border: 2px dashed #1a20d1;
            background: rgba(130,26,89,0.09);
        }
        .section-evidence input {
            margin-bottom: 10px;
        }
        .section-evidence-preview {
            margin-bottom: 10px;
            border: 2px dashed #616276;
        }
        .btn-preview-image {
            position: absolute;
            right: 30px;
            margin-top: 25px;
            align-items: center;
            /* padding: 10px!important; */
        }´
        .section-evidence-preview-zip {
            margin-bottom: 10px;
        }
        #preview-files-load {
            /* display: flex; */
            list-style: none;
            text-align: center !important;
        }
        #preview-files_1 {
            /* display: flex; */
            list-style: none;
            text-align: left !important;
        }
        #preview-files_2 {
            /* display: flex; */
            list-style: none;
            text-align: left !important;
        }
        #preview-files_3 {
            /* display: flex; */
            list-style: none;
            text-align: left !important;
        }
        #preview-files_4 {
            /* display: flex; */
            list-style: none;
            text-align: left !important;
        }
        #preview-files_5 {
            /* display: flex; */
            list-style: none;
            text-align: left !important;
        }
        #preview-files_6 {
            /* display: flex; */
            list-style: none;
            text-align: left !important;
        }
        #preview-files_7 {
            /* display: flex; */
            list-style: none;
            text-align: left !important;
        }
        /* Estilo de btn datatable */
        /*para alinear los botones y cuadro de busqueda*/
        .btn-group, .btn-group-vertical {
            position: absolute !important;
            margin-bottom: 15px !important;
        }
        .dt-buttons {
            margin-bottom: 15px !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/datatable/Buttons-2.4.2/css/buttons.bootstrap4.min.css') }}">
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Preloader Animation --}}
        @if($layoutHelper->isPreloaderEnabled())
            @include('adminlte::partials.common.preloader')
        @endif

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    <!-- Sweetalert2 for alerts more nice -->
    <script src="{{ asset('js/plugins/sweetalert2@11.js') }}"></script>
    {{-- Cargar scripts datatable --}}
    <script src="{{ asset('plugins/datatable/DataTables-1.13.6/js/jquery.dataTables.min.js') }}"></script>
    {{-- Buttons datatable --}}
    <script src="{{ asset('plugins/datatable/Buttons-2.4.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/JSZip-3.10.1/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/pdfmake-0.2.7/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/pdfmake-0.2.7/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatable/Buttons-2.4.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/Buttons-2.4.2/js/buttons.print.min.js') }}"></script>
    <!-- Load plugins -->
    <script src="{{ asset('js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/patternomaly.js') }}"></script>
    <script src="{{ asset('js/plugins/chart.min.js') }}"></script>
    <script src="{{ asset('js/plugins/parsley.min.js') }}"></script>
    <script language="JavaScript">
        $(document).ready(() => {
            $('.select2').select2();
        });
        history.forward();
    </script>
    @stack('js')
    @yield('js')
@stop

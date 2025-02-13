@extends('layouts.app')

@section('css')
    <style>
        .table_3 tbody tr {
            height: 10px !important;
            line-height: 10px !important;
        }

        .table_3 td {
            padding: 0 !important;
            height: 10px !important;
            line-height: 10px !important;
            font-size: 0.6rem;
        }

        .table_3 td button {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
            height: 30px !important;
            width: 30px !important;
            line-height: 0 !important;
        }

        .table_3 td.hidden,
        .table_3 th.hidden {
            display: none;
        }

        tfoot {
            position: sticky;
            bottom: 0;
            background: white;
            z-index: 10;
        }

        .table_3 tfoot tr {
            height: 2rem;
        }

        .table_3 tfoot tr td {
            font-size: .7rem;
        }

        .btn-actions {
            padding: 0 !important;
            /* margin: 0 !important; */
            margin-left: 2px !important;
        }
    </style>
@endsection

@section('title')
    Operaciones
@endsection

@section('content')
    @livewire('index-operation')
    @livewireScripts
@endsection

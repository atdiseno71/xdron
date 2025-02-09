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
    </style>
@endsection

@section('title')
    Operaciones
@endsection

@section('content')
    @livewire('index-operation')
    @livewireScripts
@endsection

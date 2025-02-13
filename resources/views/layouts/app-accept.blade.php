@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <style>
        
    </style>
@stop

@section('body')

    <section class="content container-fluid">
        @stack('content')
        @yield('content')
    </section>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop

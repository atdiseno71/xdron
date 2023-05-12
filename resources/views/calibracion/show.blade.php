@extends('layouts.app')

@section('template_title')
    {{ $calibracion->name ?? "{{ __('Show') Calibracion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Calibracion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('calibracions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $calibracion->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $calibracion->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo1:</strong>
                            {{ $calibracion->archivo1 }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion Piloto:</strong>
                            {{ $calibracion->observacion_piloto }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion Cliente:</strong>
                            {{ $calibracion->observacion_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo2:</strong>
                            {{ $calibracion->archivo2 }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo3:</strong>
                            {{ $calibracion->archivo3 }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $calibracion->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

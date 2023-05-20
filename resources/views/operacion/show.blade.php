@extends('layouts.app')

@section('template_title')
    {{ $operacion->name ?? "{{ __('Show') Operacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Operacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('operacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Servicio:</strong>
                            {{ $operacion->id_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Descarga:</strong>
                            {{ $operacion->descarga }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Ejecucion:</strong>
                            {{ $operacion->fecha_ejecucion }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $operacion->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Id Finca:</strong>
                            {{ $operacion->id_finca }}
                        </div>
                        <div class="form-group">
                            <strong>Zona Id:</strong>
                            {{ $operacion->zona_id }}
                        </div>
                        <div class="form-group">
                            <strong>Id Piloto:</strong>
                            {{ $operacion->id_piloto }}
                        </div>
                        <div class="form-group">
                            <strong>Evidencia Record:</strong>
                            {{ $operacion->evidencia_record }}
                        </div>
                        <div class="form-group">
                            <strong>Evidencia Track:</strong>
                            {{ $operacion->evidencia_track }}
                        </div>
                        <div class="form-group">
                            <strong>Evidencia Gps:</strong>
                            {{ $operacion->evidencia_gps }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

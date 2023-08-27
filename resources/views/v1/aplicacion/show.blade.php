@extends('layouts.app')

@section('template_title')
    {{ $aplicacion->name ?? "{{ __('Show') Aplicacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Aplicacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('aplicacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $aplicacion->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $aplicacion->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Matricula:</strong>
                            {{ $aplicacion->matricula }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $aplicacion->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Salida:</strong>
                            {{ $aplicacion->hora_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Llegada:</strong>
                            {{ $aplicacion->hora_llegada }}
                        </div>
                        <div class="form-group">
                            <strong>Consumo Combustible:</strong>
                            {{ $aplicacion->consumo_combustible }}
                        </div>
                        <div class="form-group">
                            <strong>Tanqueador:</strong>
                            {{ $aplicacion->tanqueador }}
                        </div>
                        <div class="form-group">
                            <strong>Horas Vuelo:</strong>
                            {{ $aplicacion->horas_vuelo }}
                        </div>
                        <div class="form-group">
                            <strong>Aterrizajes:</strong>
                            {{ $aplicacion->aterrizajes }}
                        </div>
                        <div class="form-group">
                            <strong>Hectareas:</strong>
                            {{ $aplicacion->hectareas }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Aplicacion:</strong>
                            {{ $aplicacion->archivo_aplicacion }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Track:</strong>
                            {{ $aplicacion->archivo_track }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Record:</strong>
                            {{ $aplicacion->archivo_record }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Mapa:</strong>
                            {{ $aplicacion->archivo_mapa }}
                        </div>
                        <div class="form-group">
                            <strong>Otro Archivo:</strong>
                            {{ $aplicacion->otro_archivo }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion Piloto:</strong>
                            {{ $aplicacion->observacion_piloto }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion Cliente:</strong>
                            {{ $aplicacion->observacion_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $aplicacion->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Descarga:</strong>
                            {{ $aplicacion->descarga }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo App:</strong>
                            {{ $aplicacion->tipo_app }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Factura:</strong>
                            {{ $aplicacion->archivo_factura }}
                        </div>
                        <div class="form-group">
                            <strong>Valor Factura:</strong>
                            {{ $aplicacion->valor_factura }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante:</strong>
                            {{ $aplicacion->comprobante }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion Factura:</strong>
                            {{ $aplicacion->observacion_factura }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

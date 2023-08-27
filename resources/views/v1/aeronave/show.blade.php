@extends('layouts.app')

@section('template_title')
    {{ $aeronave->name ?? "{{ __('Show') Aeronave" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Aeronave</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('aeronaves.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $aeronave->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Matricula:</strong>
                            {{ $aeronave->matricula }}
                        </div>
                        <div class="form-group">
                            <strong>Poliza Inicio:</strong>
                            {{ $aeronave->poliza_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Poliza Fin:</strong>
                            {{ $aeronave->poliza_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Cert Matricula Inicio:</strong>
                            {{ $aeronave->cert_matricula_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Cert Matricula Fin:</strong>
                            {{ $aeronave->cert_matricula_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Cert Aereonavegabilidad Inicio:</strong>
                            {{ $aeronave->cert_aereonavegabilidad_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Cert Aereonavegabilidad Fin:</strong>
                            {{ $aeronave->cert_aereonavegabilidad_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Antinarcoticos Inicio:</strong>
                            {{ $aeronave->antinarcoticos_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Antinarcoticos Fin:</strong>
                            {{ $aeronave->antinarcoticos_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Aereonave:</strong>
                            {{ $aeronave->archivo_aereonave }}
                        </div>
                        <div class="form-group">
                            <strong>Login:</strong>
                            {{ $aeronave->login }}
                        </div>
                        <div class="form-group">
                            <strong>Fechasys:</strong>
                            {{ $aeronave->fechasys }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Poliza:</strong>
                            {{ $aeronave->archivo_poliza }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Cert Matricula:</strong>
                            {{ $aeronave->archivo_cert_matricula }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Avion:</strong>
                            {{ $aeronave->archivo_avion }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Cert Aereonavegabilidad:</strong>
                            {{ $aeronave->archivo_cert_aereonavegabilidad }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Antinarcoticos:</strong>
                            {{ $aeronave->archivo_antinarcoticos }}
                        </div>
                        <div class="form-group">
                            <strong>Direccional Estupefacientes Inicio:</strong>
                            {{ $aeronave->direccional_estupefacientes_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Direccional Estupefacientes Fin:</strong>
                            {{ $aeronave->direccional_estupefacientes_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Direccional:</strong>
                            {{ $aeronave->archivo_direccional }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

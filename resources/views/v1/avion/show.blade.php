@extends('layouts.app')

@section('title')
    {{ $avion->name ?? "{{ Ver Avion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Avion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('avions.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Matricula:</strong>
                            {{ $avion->matricula }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $avion->marca }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $avion->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Ano:</strong>
                            {{ $avion->ano }}
                        </div>
                        <div class="form-group">
                            <strong>Serie:</strong>
                            {{ $avion->serie }}
                        </div>
                        <div class="form-group">
                            <strong>Motor:</strong>
                            {{ $avion->motor }}
                        </div>
                        <div class="form-group">
                            <strong>Horometro:</strong>
                            {{ $avion->horometro }}
                        </div>
                        <div class="form-group">
                            <strong>Alas:</strong>
                            {{ $avion->alas }}
                        </div>
                        <div class="form-group">
                            <strong>Fuselage:</strong>
                            {{ $avion->fuselage }}
                        </div>
                        <div class="form-group">
                            <strong>Helice:</strong>
                            {{ $avion->helice }}
                        </div>
                        <div class="form-group">
                            <strong>Cola:</strong>
                            {{ $avion->cola }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Motor:</strong>
                            {{ $avion->hora_motor }}
                        </div>
                        <div class="form-group">
                            <strong>Centro Costo:</strong>
                            {{ $avion->centro_costo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

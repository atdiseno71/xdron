@extends('layouts.app')

@section('template_title')
    {{ $estacionServicio->name ?? "{{ __('Show') Estacion Servicio" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estacion Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estacion-servicios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $estacionServicio->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estacionServicio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $estacionServicio->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $estacionServicio->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $estacionServicio->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

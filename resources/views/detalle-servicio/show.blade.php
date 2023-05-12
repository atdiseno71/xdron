@extends('layouts.app')

@section('template_title')
    {{ $detalleServicio->name ?? "{{ __('Show') Detalle Servicio" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalle Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalle-servicios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detalleServicio->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Id Inventario:</strong>
                            {{ $detalleServicio->id_inventario }}
                        </div>
                        <div class="form-group">
                            <strong>Num Servicio:</strong>
                            {{ $detalleServicio->num_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $detalleServicio->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

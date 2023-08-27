@extends('layouts.app')

@section('template_title')
    {{ $compraInventario->name ?? "{{ __('Show') Compra Inventario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Compra Inventario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('compra-inventarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Factura:</strong>
                            {{ $compraInventario->id_factura }}
                        </div>
                        <div class="form-group">
                            <strong>Saldo:</strong>
                            {{ $compraInventario->saldo }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $compraInventario->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $compraInventario->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $compraInventario->observacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Pago:</strong>
                            {{ $compraInventario->fecha_pago }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $compraInventario->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $compraInventario->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

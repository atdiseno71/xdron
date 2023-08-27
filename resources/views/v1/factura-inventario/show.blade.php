@extends('layouts.app')

@section('template_title')
    {{ $facturaInventario->name ?? "{{ __('Show') Factura Inventario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Factura Inventario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('factura-inventarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Proveedor:</strong>
                            {{ $facturaInventario->id_proveedor }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $facturaInventario->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $facturaInventario->total }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Factura:</strong>
                            {{ $facturaInventario->archivo_factura }}
                        </div>
                        <div class="form-group">
                            <strong>No Factura:</strong>
                            {{ $facturaInventario->no_factura }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $facturaInventario->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Vencimiento:</strong>
                            {{ $facturaInventario->fecha_vencimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $facturaInventario->observacion }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $facturaInventario->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

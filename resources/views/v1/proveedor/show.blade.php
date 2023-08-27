@extends('layouts.app')

@section('template_title')
    {{ $proveedor->name ?? "{{ __('Show') Proveedor" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proveedor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $proveedor->ciudad }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $proveedor->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $proveedor->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $proveedor->email }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo Factura:</strong>
                            {{ $proveedor->archivo_factura }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proveedor->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Identificacion:</strong>
                            {{ $proveedor->identificacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

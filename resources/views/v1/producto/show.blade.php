@extends('layouts.app')

@section('title')
    {{ $producto->name ?? "{{ Ver Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $producto->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Descarga:</strong>
                            {{ $producto->descarga }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

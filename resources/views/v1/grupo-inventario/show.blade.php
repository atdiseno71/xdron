@extends('layouts.app')

@section('title')
    {{ $grupoInventario->name ?? "{{ Ver Grupo Inventario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Grupo Inventario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grupo-inventarios.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $grupoInventario->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cuenta Puc:</strong>
                            {{ $grupoInventario->cuenta_puc }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

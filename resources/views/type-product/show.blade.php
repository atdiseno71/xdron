@extends('layouts.app')

@section('title')
    {{ $typeProduct->name ?? "Ver Tipo Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Tipo Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type-products.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $typeProduct->name }}
                        </div>
                        <div class="form-group">
                            <strong>Creado por:</strong>
                            {{ $typeProduct->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $typeProduct->observations }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

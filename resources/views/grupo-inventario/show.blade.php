@extends('layouts.app')

@section('template_title')
    {{ $grupoInventario->name ?? "{{ __('Show') Grupo Inventario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Grupo Inventario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grupo-inventarios.index') }}"> {{ __('Back') }}</a>
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

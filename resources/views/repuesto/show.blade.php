@extends('layouts.app')

@section('template_title')
    {{ $repuesto->name ?? "{{ __('Show') Repuesto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Repuesto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('repuestos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $repuesto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Id Proveedor:</strong>
                            {{ $repuesto->id_proveedor }}
                        </div>
                        <div class="form-group">
                            <strong>Id Pn:</strong>
                            {{ $repuesto->id_pn }}
                        </div>
                        <div class="form-group">
                            <strong>Id Marca:</strong>
                            {{ $repuesto->id_marca }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $operacion->name ?? "{{ __('Show') Operacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Operacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('operacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $operacion->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Horas Voladas:</strong>
                            {{ $operacion->horas_voladas }}
                        </div>
                        <div class="form-group">
                            <strong>Consumo Combustible:</strong>
                            {{ $operacion->consumo_combustible }}
                        </div>
                        <div class="form-group">
                            <strong>Motivo:</strong>
                            {{ $operacion->motivo }}
                        </div>
                        <div class="form-group">
                            <strong>Aterrizajes:</strong>
                            {{ $operacion->aterrizajes }}
                        </div>
                        <div class="form-group">
                            <strong>Matricula:</strong>
                            {{ $operacion->matricula }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

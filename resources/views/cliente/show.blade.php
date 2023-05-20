@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? "{{ __('Show') Cliente" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $cliente->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Contacto:</strong>
                            {{ $cliente->contacto }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $cliente->email }}
                        </div>
                        <div class="form-group">
                            <strong>Campos Nuevos:</strong>
                            {{ $cliente->campos_nuevos }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $cliente->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $cliente->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Email Encargado:</strong>
                            {{ $cliente->email_encargado }}
                        </div>
                        <div class="form-group">
                            <strong>Email1:</strong>
                            {{ $cliente->email1 }}
                        </div>
                        <div class="form-group">
                            <strong>Email2:</strong>
                            {{ $cliente->email2 }}
                        </div>
                        <div class="form-group">
                            <strong>Email3:</strong>
                            {{ $cliente->email3 }}
                        </div>
                        <div class="form-group">
                            <strong>Id Finca:</strong>
                            {{ $cliente->id_finca }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

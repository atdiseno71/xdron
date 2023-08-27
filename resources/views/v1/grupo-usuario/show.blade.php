@extends('layouts.app')

@section('template_title')
    {{ $grupoUsuario->name ?? "{{ __('Show') Grupo Usuario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Grupo Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grupo-usuarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $grupoUsuario->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Id Grupo:</strong>
                            {{ $grupoUsuario->id_grupo }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $grupoUsuario->cliente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

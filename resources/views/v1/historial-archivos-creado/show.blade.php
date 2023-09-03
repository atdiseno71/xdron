@extends('layouts.app')

@section('title')
    {{ $historialArchivosCreado->name ?? "{{ Ver Historial Archivos Creado" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Historial Archivos Creado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('historial-archivos-creados.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Directorio:</strong>
                            {{ $historialArchivosCreado->directorio }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Archivo:</strong>
                            {{ $historialArchivosCreado->nombre_archivo }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $historialArchivosCreado->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Registro:</strong>
                            {{ $historialArchivosCreado->fecha_registro }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

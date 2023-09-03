@extends('layouts.app')

@section('title')
    Actualizar Historial Archivos Creado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Historial Archivos Creado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('historial-archivos-creados.update', $historialArchivosCreado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('historial-archivos-creado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

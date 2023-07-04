@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Operacion
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Operacion</span>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('operaciones.index') }}"> Cancelar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('operaciones.update', $operacion->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('operacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

    <script src="{{ asset('js/views/image-preview.js') }}"></script>

@endsection

@extends('layouts.app')

@section('title')
    Crear Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Servicio</span>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('servicios.index') }}"> Cancelar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('servicios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

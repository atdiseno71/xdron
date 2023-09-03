@extends('layouts.app')

@section('title')
    Actualizar Estacion Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Estacion Servicio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estacion-servicios.update', $estacionServicio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('estacion-servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title')
    Actualizar Aplicacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Aplicacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('aplicacions.update', $aplicacion->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('aplicacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

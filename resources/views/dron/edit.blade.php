@extends('layouts.app')

@section('title')
    Actualizar Dron
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Actualizar Dron</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('drons.index') }}"> Volver</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('drons.update', $dron->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('dron.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

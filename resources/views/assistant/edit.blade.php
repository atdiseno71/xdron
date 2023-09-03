@extends('layouts.app')

@section('title')
    Actualizar Asistante
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Actualizar Asistante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('assistants.index') }}"> Volver</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('assistants.update', $assistant->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('assistant.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

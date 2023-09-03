@extends('layouts.app')

@section('title')
    Actualizar Suerte
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Suerte</span>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('suertes.index') }}"> Cancelar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('suertes.update', $suerte->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('suerte.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

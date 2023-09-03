@extends('layouts.app')

@section('title')
    Actualizar Finca
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Finca</span>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('fincas.index') }}"> Cancelar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('fincas.update', $finca->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('finca.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

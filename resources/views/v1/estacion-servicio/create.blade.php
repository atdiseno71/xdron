@extends('layouts.app')

@section('title')
    {{ __('Create') }} Estacion Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Estacion Servicio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('estacion-servicios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('estacion-servicio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

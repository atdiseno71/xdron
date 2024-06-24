@extends('layouts.app')

@section('title')
    Crear tipo producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Crear tipo producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type-products.index') }}"> Volver</a>
                        </div>
                    </div>
                    {{-- Plantilla mensajes --}}
                    @include('layouts.message')
                    <div class="card-body">
                        <form method="POST" action="{{ route('type-products.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('type-product.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

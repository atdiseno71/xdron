@extends('layouts.app')

@section('title')
    {{ __('Update') }} Factura Inventario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Factura Inventario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('factura-inventarios.update', $facturaInventario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('factura-inventario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

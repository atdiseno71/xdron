@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Grupo Inventario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Grupo Inventario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupo-inventarios.update', $grupoInventario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('grupo-inventario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
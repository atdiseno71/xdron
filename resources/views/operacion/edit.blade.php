@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Operacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Operacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('operacions.update', $operacion->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('operacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

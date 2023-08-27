@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Repuesto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Repuesto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('repuestos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('repuesto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Ciudad
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Ciudad</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ciudads.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('ciudad.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

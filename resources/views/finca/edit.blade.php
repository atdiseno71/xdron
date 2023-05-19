@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Finca
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Finca</span>
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

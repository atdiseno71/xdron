@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Assistant
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Assistant</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('assistants.update', $assistant->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('assistant.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $suerte->name ?? "__('Show') Suerte" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Suerte</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('suertes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $suerte->name }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $suerte->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Id Zona:</strong>
                            {{ $suerte->id_zona }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

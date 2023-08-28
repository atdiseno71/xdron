@extends('layouts.app')

@section('template_title')
    {{ $dron->name ?? "{{ __('Show') Dron" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Dron</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('drons.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Enrollment:</strong>
                            {{ $dron->enrollment }}
                        </div>
                        <div class="form-group">
                            <strong>Brand:</strong>
                            {{ $dron->brand }}
                        </div>
                        <div class="form-group">
                            <strong>Model:</strong>
                            {{ $dron->model }}
                        </div>
                        <div class="form-group">
                            <strong>Year:</strong>
                            {{ $dron->year }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $dron->created_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $estate->name ?? "{{ __('Show') Estate" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estate</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estates.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $estate->name }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $estate->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $estate->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Observations:</strong>
                            {{ $estate->observations }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

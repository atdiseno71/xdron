@extends('layouts.app')

@section('template_title')
    {{ $assistant->name ?? "{{ __('Show') Assistant" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Assistant</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('assistants.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $assistant->name }}
                        </div>
                        <div class="form-group">
                            <strong>Lastname:</strong>
                            {{ $assistant->lastname }}
                        </div>
                        <div class="form-group">
                            <strong>Type Document:</strong>
                            {{ $assistant->type_document }}
                        </div>
                        <div class="form-group">
                            <strong>Document Number:</strong>
                            {{ $assistant->document_number }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $assistant->created_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

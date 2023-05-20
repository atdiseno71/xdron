@extends('layouts.app')

@section('template_title')
    {{ $finca->name ?? "{{ __('Show') Finca" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Finca</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fincas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $finca->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

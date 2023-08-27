@extends('layouts.app')

@section('template_title')
    {{ $ciudad->name ?? "{{ __('Show') Ciudad" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ciudad</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ciudads.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $ciudad->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

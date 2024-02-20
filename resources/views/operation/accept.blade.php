@extends('layouts.app-accept')

@section('title')
    ¿Acepta la operación?
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                <br>

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">¿Acepte la operación?</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('operation.accept', $operation->id) }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="row">
                                        {{-- Plantilla mensajes --}}
                                        @include('layouts.message')
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('status_id', 'Modificar estado') }}
                                                {{ Form::select('status_id', $statuses, '', ['class' => 'form-control select2' . ($errors->has('status_id') ? ' is-invalid' : ''), 'placeholder' => '¿Acepta la operación?']) }}
                                                {!! $errors->first('status_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('id_cliente', 'Cliente') }}
                                                {{ Form::select('id_cliente', $clients, $operation->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Seleccione cliente']) }}
                                                {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('assistant_id_one', 'Tanqueador uno') }}
                                                {{ Form::select('assistant_id_one', $assistents, $operation->assistant_id_one, ['class' => 'form-control' . ($errors->has('assistant_id_one') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Seleccione Tanqueador uno']) }}
                                                {!! $errors->first('assistant_id_one', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('assistant_id_two', 'Tanqueador dos') }}
                                                {{ Form::select('assistant_id_two', $assistents, $operation->assistant_id_two, ['class' => 'form-control' . ($errors->has('assistant_id_two') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Seleccione Tanqueador uno']) }}
                                                {!! $errors->first('assistant_id_two', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('observation', 'Observaciones') }}
                                                {{ Form::textArea('observation', $operation->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                                                {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div> 
                                        {{-- <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('id_cliente', 'Cliente') }}
                                                {{ Form::select('id_cliente', $clients, $operation->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Seleccione cliente']) }}
                                                {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('assistant_id_one', 'Tanqueador uno') }}
                                                {{ Form::select('assistant_id_one', $assistents, $operation->assistant_id_one, ['class' => 'form-control' . ($errors->has('assistant_id_one') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Seleccione Tanqueador uno']) }}
                                                {!! $errors->first('assistant_id_one', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('assistant_id_one', 'Tanqueador uno') }}
                                                {{ Form::select('assistant_id_one', $assistents, $operation->assistant_id_one, ['class' => 'form-control' . ($errors->has('assistant_id_one') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Seleccione Tanqueador uno']) }}
                                                {!! $errors->first('assistant_id_one', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>    --}}                                                                            
                                    </div>
                                </div>
                                <br>
                                @include('layouts.btn-submit')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title')
    {{ $operation->name ?? "Ver Operation" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Operation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('operations.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Download:</strong>
                            {{ $operation->download }}
                        </div>
                        <div class="form-group">
                            <strong>Observation Admin:</strong>
                            {{ $operation->observation_admin }}
                        </div>
                        <div class="form-group">
                            <strong>Observation Pilot:</strong>
                            {{ $operation->observation_pilot }}
                        </div>
                        <div class="form-group">
                            <strong>Observation Assistant One:</strong>
                            {{ $operation->observation_assistant_one }}
                        </div>
                        <div class="form-group">
                            <strong>Observation Assistant Two:</strong>
                            {{ $operation->observation_assistant_two }}
                        </div>
                        <div class="form-group">
                            <strong>Type Product Id:</strong>
                            {{ $operation->type_product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Assistant Id One:</strong>
                            {{ $operation->assistant_id_one }}
                        </div>
                        <div class="form-group">
                            <strong>Assistant Id Two:</strong>
                            {{ $operation->assistant_id_two }}
                        </div>
                        <div class="form-group">
                            <strong>Pilot Id:</strong>
                            {{ $operation->pilot_id }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cliente:</strong>
                            {{ $operation->id_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Admin By:</strong>
                            {{ $operation->admin_by }}
                        </div>
                        <div class="form-group">
                            <strong>Status Id:</strong>
                            {{ $operation->status_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

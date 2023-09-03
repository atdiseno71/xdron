@extends('layouts.app')

@section('title')
    {{ $status->name ?? "{{ Ver Status" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Status</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('statuses.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $status->name }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $status->slug }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

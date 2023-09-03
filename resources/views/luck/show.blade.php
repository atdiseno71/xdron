@extends('layouts.app')

@section('title')
    {{ $luck->name ?? "{{ Ver Luck" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Luck</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('lucks.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $luck->name }}
                        </div>
                        <div class="form-group">
                            <strong>Observations:</strong>
                            {{ $luck->observations }}
                        </div>
                        <div class="form-group">
                            <strong>Estate Id:</strong>
                            {{ $luck->estate_id }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $luck->created_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

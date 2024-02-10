@extends('layouts.app')

@section('title')
    {{ $department->name ?? "Ver Department" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Department</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('departments.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $department->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

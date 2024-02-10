@extends('layouts.app')

@section('title')
    {{ $typeDocument->name ?? "Ver Type Document" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Type Document</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type-documents.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $typeDocument->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

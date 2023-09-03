@extends('layouts.app')

@section('title')
    {{ $zona->name ?? "{{ Ver Zona" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Zona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('zonas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $zona->name }}
                        </div>
                        <div class="form-group">
                            <strong>Id Finca:</strong>
                            {{ $zona->id_finca }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

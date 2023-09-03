@extends('layouts.app')

@section('title')
    {{ $filesOperation->name ?? "{{ Ver Files Operation" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Files Operation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('files-operations.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Record:</strong>
                            {{ $filesOperation->record }}
                        </div>
                        <div class="form-group">
                            <strong>Track:</strong>
                            {{ $filesOperation->track }}
                        </div>
                        <div class="form-group">
                            <strong>Map:</strong>
                            {{ $filesOperation->map }}
                        </div>
                        <div class="form-group">
                            <strong>Detail Operation Id:</strong>
                            {{ $filesOperation->detail_operation_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

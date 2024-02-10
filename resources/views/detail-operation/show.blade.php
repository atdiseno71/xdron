@extends('layouts.app')

@section('title')
    {{ $detailOperation->name ?? "Ver Detail Operation" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Detail Operation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detail-operations.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Number Flights:</strong>
                            {{ $detailOperation->number_flights }}
                        </div>
                        <div class="form-group">
                            <strong>Hour Flights:</strong>
                            {{ $detailOperation->hour_flights }}
                        </div>
                        <div class="form-group">
                            <strong>Acres:</strong>
                            {{ $detailOperation->acres }}
                        </div>
                        <div class="form-group">
                            <strong>Download:</strong>
                            {{ $detailOperation->download }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $detailOperation->description }}
                        </div>
                        <div class="form-group">
                            <strong>Observation:</strong>
                            {{ $detailOperation->observation }}
                        </div>
                        <div class="form-group">
                            <strong>Estate Id:</strong>
                            {{ $detailOperation->estate_id }}
                        </div>
                        <div class="form-group">
                            <strong>Luck Id:</strong>
                            {{ $detailOperation->luck_id }}
                        </div>
                        <div class="form-group">
                            <strong>Zone Id:</strong>
                            {{ $detailOperation->zone_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

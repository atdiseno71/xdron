@extends('layouts.app')

@section('title')
    {{ $client->full_name_user ?? 'Ver clientes'}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Client</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clients.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $client->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Social Reason:</strong>
                            {{ $client->social_reason }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $client->address }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $client->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Email Enterprise:</strong>
                            {{ $client->email_enterprise }}
                        </div>
                        <div class="form-group">
                            <strong>Email Enterprise2:</strong>
                            {{ $client->email_enterprise2 }}
                        </div>
                        <div class="form-group">
                            <strong>Email User:</strong>
                            {{ $client->email_user }}
                        </div>
                        <div class="form-group">
                            <strong>Full Name User:</strong>
                            {{ $client->full_name_user }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $client->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Observations:</strong>
                            {{ $client->observations }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

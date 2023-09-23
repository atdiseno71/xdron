@extends('layouts.app')

@section('title')
    Actualizar operacion
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar operacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('operations.update', $operation->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @if ($role_user == 'super.root')
                                @include('operation.form-admin')
                            @elseif ($role_user == 'piloto')
                                @include('operation.form-pilot')
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

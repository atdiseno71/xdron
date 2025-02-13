@extends('layouts.app')

@section('title')
    Crear Zona
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Zona</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('zones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('zone.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

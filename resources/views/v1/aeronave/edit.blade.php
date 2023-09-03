@extends('layouts.app')

@section('title')
    Actualizar Aeronave
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Aeronave</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('aeronaves.update', $aeronave->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('aeronave.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

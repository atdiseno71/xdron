@extends('layouts.app')

@section('title')
    Crear Detail Operation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Detail Operation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detail-operations.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('detail-operation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

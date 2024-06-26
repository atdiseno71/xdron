@extends('layouts.app')

@section('title')
    Actualizar Detail Operation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Detail Operation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detail-operations.update', $detailOperation->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('detail-operation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

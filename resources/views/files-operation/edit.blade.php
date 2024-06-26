@extends('layouts.app')

@section('title')
    Actualizar Files Operation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Files Operation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('files-operations.update', $filesOperation->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('files-operation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

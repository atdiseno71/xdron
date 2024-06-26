@extends('layouts.app')

@section('title')
    Crear Type Document
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Type Document</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('type-documents.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('type-document.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

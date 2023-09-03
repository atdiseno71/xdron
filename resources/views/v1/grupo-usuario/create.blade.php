@extends('layouts.app')

@section('title')
    {{ __('Create') }} Grupo Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Grupo Usuario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupo-usuarios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('grupo-usuario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

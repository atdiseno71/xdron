@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Grupo Usuario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Grupo Usuario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupo-usuarios.update', $grupoUsuario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('grupo-usuario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

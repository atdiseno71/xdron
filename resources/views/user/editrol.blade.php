@extends('adminlte::page')

@section('title')
    {{ $user->name ?? 'Asignar rol a usuarios' }}
@endsection

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Asignar roles</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('users.index') }}"> Cancelar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <p class="h5">Nombre: </p>
                        <p class="form-control">{{ $user->name }}</p>

                        <h2 class="h5">Listado de roles</h2>

                        {!! Form::model($user, ['route' => ['users.asignar', $user], 'method' => 'put']) !!}

                            @foreach ($roles as $role)
                                <div>
                                    <label>
                                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach

                            {!! Form::submit('Guardar', ['class' => 'btn-block btn btn-primary']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

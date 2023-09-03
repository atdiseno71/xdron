@extends('layouts.app')

@section('title')
    Grupo Usuario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Grupo Usuario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('grupo-usuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Id User</th>
										<th>Id Grupo</th>
										<th>Cliente</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupoUsuarios as $grupoUsuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $grupoUsuario->id_user }}</td>
											<td>{{ $grupoUsuario->id_grupo }}</td>
											<td>{{ $grupoUsuario->cliente }}</td>

                                            <td>
                                                <form action="{{ route('grupo-usuarios.destroy',$grupoUsuario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('grupo-usuarios.show',$grupoUsuario->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('grupo-usuarios.edit',$grupoUsuario->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $grupoUsuarios->links() !!}
            </div>
        </div>
    </div>
@endsection

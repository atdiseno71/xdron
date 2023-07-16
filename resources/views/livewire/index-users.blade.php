<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="float-left">
                            <input wire:model="search" class="form-control" placeholder="Ingrese lo que desee buscar">
                        </div>

                        <div class="float-right">
                            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                Nuevo usuario
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Plantilla mensajes--}}
                @include('layouts.message')

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Activo</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            <form action="{{ route('users.active', $user->id) }}" method="POST" id="formUser">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" name="active" {{ $user->active == 1 ? 'checked' : '' }}>
                                                </div>
                                                @csrf
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('users.destroy',$user->id) }}" method="POST" class="form-delete">
                                                @can('users.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('users.destroy')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="9">{{__('We have nothing registered.')}}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $users->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
</div>

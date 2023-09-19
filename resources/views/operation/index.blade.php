@extends('layouts.app')

@section('title')
    Operaciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Operacion
                            </span>

                            <div class="float-right">
                                <a href="{{ route('operations.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Crear nuevo
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

                                        <th>Tipo producto</th>
                                        <th>Asistentes</th>
                                        <th>Piloto</th>
                                        <th>Cliente</th>
                                        <th>Administrador</th>
                                        <th>Estado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operations as $operation)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $operation->product?->name }}</td>
                                            <td>{{ $operation->assistant_one?->name . ', ' . $operation->assistant_two?->name }}</td>
                                            <td>{{ $operation->userPilot?->name }}</td>
                                            <td>{{ $operation->client?->full_name_user }}</td>
                                            <td>{{ $operation->userAdmin?->name }}</td>
                                            <td>{{ $operation->status?->name }}</td>

                                            <td>
                                                <form action="{{ route('operations.destroy', $operation->id) }}"
                                                    method="POST"  class="form-delete">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('operations.show', $operation->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('operations.edit', $operation->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $operations->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>

@endsection

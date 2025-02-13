@extends('layouts.app')

@section('title')
    Clientes
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Client') }}
                        </span>

                        <div class="float-right">
                            @can('clients.create')
                                <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Crear nuevo
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>

                {{-- Plantilla mensajes --}}
                @include('layouts.message')

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Nit</th>
                                    <th>Razon social</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Nombre completo</th>
                                    <th>Creado por</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $client->nit }}</td>
                                        <td>{{ $client->social_reason }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->full_name_user }}</td>
                                        <td>{{ $client->createBy?->name }}</td>

                                        <td>
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                                class="form-delete">
                                                @can('clients.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('clients.show', $client->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                @endcan
                                                @can('clients.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('clients.edit', $client->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('clients.destroy')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i></button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $clients->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>
@endsection

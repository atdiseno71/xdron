@extends('layouts.app')

@section('template_title')
    Cliente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Clientes
                            </span>

                            {{-- <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    Asociar clientes
                                </a>
                            </div> --}}
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

										<th>Nit</th>
										<th>Nombre</th>
										<th>Contacto</th>
										<th>Email</th>
										<th>Finca</th>
										<th>Creación</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $cliente->document_number }}</td>
											<td>{{ $cliente->name }}</td>
											<td>{{ $cliente->cliente?->contacto ?? '' }}</td>
											<td>{{ $cliente->email }}</td>
											<td>
                                                @foreach($cliente->cliente->clientesFincas as $clienteFinca)
                                                    {{ $clienteFinca->finca->name }}
                                                    @if (!$loop->last)
                                                        , <!-- Agrega una coma si no es el último elemento -->
                                                    @endif
                                                @endforeach
                                            </td>
											<td>{{ $cliente->created_at }}</td>

                                            <td>
                                                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST" class="form-delete">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i></a> --}}
                                                    @can('clientes.edit')
                                                        <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('clientes.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
                        {{ $clientes->appends(request()->except('page'))->links('vendor.pagination.custom') }}
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

@extends('layouts.app')

@section('title')
    Finca
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Finca') }}
                            </span>

                             <div class="float-right">
                                @can('fincas.create')
                                    <a href="{{ route('fincas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        Crear nuevo
                                    </a>
                                @endcan
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

										<th>Nombre</th>

										<th>Suertes</th>
										<th>Clientes</th>
										<th>Fecha creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fincas as $finca)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $finca->name }}</td>
											<td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('suertes.index') }}"><i class="fa fa-fw fa-eye"></i>{{--  --}}</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success " href="{{ route('clientes.index') }}"><i class="fa fa-fw fa-eye"></i>{{--  --}}</a>
                                            </td>
											<td>{{ $finca->created_at }}</td>

                                            <td>
                                                <form action="{{ route('fincas.destroy',$finca->id) }}" method="POST" class="form-delete">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('fincas.show',$finca->id) }}"><i class="fa fa-fw fa-eye"></i>{{--  --}}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('fincas.edit',$finca->id) }}"><i class="fa fa-fw fa-edit"></i>{{--  --}}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('fincas.show')

                                                    @endcan
                                                    @can('fincas.edit')

                                                    @endcan
                                                    @can('fincas.destroy')

                                                    @endcan
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>{{--  --}}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $fincas->appends(request()->except('page'))->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>

@endsection

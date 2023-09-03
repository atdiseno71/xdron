@extends('layouts.app')

@section('title')
    Compra Inventario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Compra Inventario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('compra-inventarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear nuevo
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

										<th>Id Factura</th>
										<th>Saldo</th>
										<th>Monto</th>
										<th>Fecha Inicio</th>
										<th>Observacion</th>
										<th>Fecha Pago</th>
										<th>Estado</th>
										<th>Id User</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compraInventarios as $compraInventario)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $compraInventario->id_factura }}</td>
											<td>{{ $compraInventario->saldo }}</td>
											<td>{{ $compraInventario->monto }}</td>
											<td>{{ $compraInventario->fecha_inicio }}</td>
											<td>{{ $compraInventario->observacion }}</td>
											<td>{{ $compraInventario->fecha_pago }}</td>
											<td>{{ $compraInventario->estado }}</td>
											<td>{{ $compraInventario->id_user }}</td>

                                            <td>
                                                <form action="{{ route('compra-inventarios.destroy',$compraInventario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('compra-inventarios.show',$compraInventario->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('compra-inventarios.edit',$compraInventario->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $compraInventarios->links() !!}
            </div>
        </div>
    </div>
@endsection

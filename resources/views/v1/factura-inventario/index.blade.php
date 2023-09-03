@extends('layouts.app')

@section('title')
    Factura Inventario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Factura Inventario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('factura-inventarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Id Proveedor</th>
										<th>Fecha</th>
										<th>Total</th>
										<th>Archivo Factura</th>
										<th>No Factura</th>
										<th>Estado</th>
										<th>Fecha Vencimiento</th>
										<th>Observacion</th>
										<th>Id User</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($facturaInventarios as $facturaInventario)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $facturaInventario->id_proveedor }}</td>
											<td>{{ $facturaInventario->fecha }}</td>
											<td>{{ $facturaInventario->total }}</td>
											<td>{{ $facturaInventario->archivo_factura }}</td>
											<td>{{ $facturaInventario->no_factura }}</td>
											<td>{{ $facturaInventario->estado }}</td>
											<td>{{ $facturaInventario->fecha_vencimiento }}</td>
											<td>{{ $facturaInventario->observacion }}</td>
											<td>{{ $facturaInventario->id_user }}</td>

                                            <td>
                                                <form action="{{ route('factura-inventarios.destroy',$facturaInventario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('factura-inventarios.show',$facturaInventario->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('factura-inventarios.edit',$facturaInventario->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $facturaInventarios->links() !!}
            </div>
        </div>
    </div>
@endsection

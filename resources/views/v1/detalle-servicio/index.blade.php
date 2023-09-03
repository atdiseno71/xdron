@extends('layouts.app')

@section('title')
    Detalle Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle Servicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalle-servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Cantidad</th>
										<th>Id Inventario</th>
										<th>Num Servicio</th>
										<th>Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalleServicios as $detalleServicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $detalleServicio->cantidad }}</td>
											<td>{{ $detalleServicio->id_inventario }}</td>
											<td>{{ $detalleServicio->num_servicio }}</td>
											<td>{{ $detalleServicio->fecha }}</td>

                                            <td>
                                                <form action="{{ route('detalle-servicios.destroy',$detalleServicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalle-servicios.show',$detalleServicio->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalle-servicios.edit',$detalleServicio->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $detalleServicios->links() !!}
            </div>
        </div>
    </div>
@endsection

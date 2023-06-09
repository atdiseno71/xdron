@extends('layouts.app')

@section('template_title')
    Operacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Operacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('operaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Id Servicio</th>
										<th>Descarga</th>
										<th>Fecha Ejecucion</th>
										<th>Id Cliente</th>
										<th>Id Finca</th>
										<th>Zona Id</th>
										<th>Id Piloto</th>
										<th>Evidencia Record</th>
										<th>Evidencia Track</th>
										<th>Evidencia Gps</th>
										<th>Observaciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operaciones as $operacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $operacion->id_servicio }}</td>
											<td>{{ $operacion->descarga }}</td>
											<td>{{ $operacion->fecha_ejecucion }}</td>
											<td>{{ $operacion->id_cliente }}</td>
											<td>{{ $operacion->id_finca }}</td>
											<td>{{ $operacion->zona_id }}</td>
											<td>{{ $operacion->id_piloto }}</td>
											<td>{{ $operacion->evidencia_record }}</td>
											<td>{{ $operacion->evidencia_track }}</td>
											<td>{{ $operacion->evidencia_gps }}</td>
											<td>{{ $operacion->observaciones }}</td>

                                            <td>
                                                <form action="{{ route('operaciones.destroy',$operacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('operaciones.show',$operacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('operaciones.edit',$operacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $operaciones->links() !!}
            </div>
        </div>
    </div>
@endsection

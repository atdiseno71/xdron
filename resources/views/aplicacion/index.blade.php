@extends('layouts.app')

@section('template_title')
    Aplicacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Aplicacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('aplicacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Cliente</th>
										<th>Id Producto</th>
										<th>Matricula</th>
										<th>Fecha</th>
										<th>Hora Salida</th>
										<th>Hora Llegada</th>
										<th>Consumo Combustible</th>
										<th>Tanqueador</th>
										<th>Horas Vuelo</th>
										<th>Aterrizajes</th>
										<th>Hectareas</th>
										<th>Archivo Aplicacion</th>
										<th>Archivo Track</th>
										<th>Archivo Record</th>
										<th>Archivo Mapa</th>
										<th>Otro Archivo</th>
										<th>Observacion Piloto</th>
										<th>Observacion Cliente</th>
										<th>Id User</th>
										<th>Descarga</th>
										<th>Tipo App</th>
										<th>Archivo Factura</th>
										<th>Valor Factura</th>
										<th>Comprobante</th>
										<th>Observacion Factura</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aplicacions as $aplicacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $aplicacion->id_cliente }}</td>
											<td>{{ $aplicacion->id_producto }}</td>
											<td>{{ $aplicacion->matricula }}</td>
											<td>{{ $aplicacion->fecha }}</td>
											<td>{{ $aplicacion->hora_salida }}</td>
											<td>{{ $aplicacion->hora_llegada }}</td>
											<td>{{ $aplicacion->consumo_combustible }}</td>
											<td>{{ $aplicacion->tanqueador }}</td>
											<td>{{ $aplicacion->horas_vuelo }}</td>
											<td>{{ $aplicacion->aterrizajes }}</td>
											<td>{{ $aplicacion->hectareas }}</td>
											<td>{{ $aplicacion->archivo_aplicacion }}</td>
											<td>{{ $aplicacion->archivo_track }}</td>
											<td>{{ $aplicacion->archivo_record }}</td>
											<td>{{ $aplicacion->archivo_mapa }}</td>
											<td>{{ $aplicacion->otro_archivo }}</td>
											<td>{{ $aplicacion->observacion_piloto }}</td>
											<td>{{ $aplicacion->observacion_cliente }}</td>
											<td>{{ $aplicacion->id_user }}</td>
											<td>{{ $aplicacion->descarga }}</td>
											<td>{{ $aplicacion->tipo_app }}</td>
											<td>{{ $aplicacion->archivo_factura }}</td>
											<td>{{ $aplicacion->valor_factura }}</td>
											<td>{{ $aplicacion->comprobante }}</td>
											<td>{{ $aplicacion->observacion_factura }}</td>

                                            <td>
                                                <form action="{{ route('aplicacions.destroy',$aplicacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('aplicacions.show',$aplicacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('aplicacions.edit',$aplicacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $aplicacions->links() !!}
            </div>
        </div>
    </div>
@endsection

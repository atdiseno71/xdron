@extends('layouts.app')

@section('title')
    Aeronave
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Aeronave') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('aeronaves.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Id Cliente</th>
										<th>Matricula</th>
										<th>Poliza Inicio</th>
										<th>Poliza Fin</th>
										<th>Cert Matricula Inicio</th>
										<th>Cert Matricula Fin</th>
										<th>Cert Aereonavegabilidad Inicio</th>
										<th>Cert Aereonavegabilidad Fin</th>
										<th>Antinarcoticos Inicio</th>
										<th>Antinarcoticos Fin</th>
										<th>Archivo Aereonave</th>
										<th>Login</th>
										<th>Fechasys</th>
										<th>Archivo Poliza</th>
										<th>Archivo Cert Matricula</th>
										<th>Archivo Avion</th>
										<th>Archivo Cert Aereonavegabilidad</th>
										<th>Archivo Antinarcoticos</th>
										<th>Direccional Estupefacientes Inicio</th>
										<th>Direccional Estupefacientes Fin</th>
										<th>Archivo Direccional</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aeronaves as $aeronave)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $aeronave->id_cliente }}</td>
											<td>{{ $aeronave->matricula }}</td>
											<td>{{ $aeronave->poliza_inicio }}</td>
											<td>{{ $aeronave->poliza_fin }}</td>
											<td>{{ $aeronave->cert_matricula_inicio }}</td>
											<td>{{ $aeronave->cert_matricula_fin }}</td>
											<td>{{ $aeronave->cert_aereonavegabilidad_inicio }}</td>
											<td>{{ $aeronave->cert_aereonavegabilidad_fin }}</td>
											<td>{{ $aeronave->antinarcoticos_inicio }}</td>
											<td>{{ $aeronave->antinarcoticos_fin }}</td>
											<td>{{ $aeronave->archivo_aereonave }}</td>
											<td>{{ $aeronave->login }}</td>
											<td>{{ $aeronave->fechasys }}</td>
											<td>{{ $aeronave->archivo_poliza }}</td>
											<td>{{ $aeronave->archivo_cert_matricula }}</td>
											<td>{{ $aeronave->archivo_avion }}</td>
											<td>{{ $aeronave->archivo_cert_aereonavegabilidad }}</td>
											<td>{{ $aeronave->archivo_antinarcoticos }}</td>
											<td>{{ $aeronave->direccional_estupefacientes_inicio }}</td>
											<td>{{ $aeronave->direccional_estupefacientes_fin }}</td>
											<td>{{ $aeronave->archivo_direccional }}</td>

                                            <td>
                                                <form action="{{ route('aeronaves.destroy',$aeronave->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('aeronaves.show',$aeronave->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('aeronaves.edit',$aeronave->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $aeronaves->links() !!}
            </div>
        </div>
    </div>
@endsection

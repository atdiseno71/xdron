@extends('layouts.app')

@section('title')
    Calibracion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Calibracion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('calibracions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Fecha</th>
										<th>Archivo1</th>
										<th>Observacion Piloto</th>
										<th>Observacion Cliente</th>
										<th>Archivo2</th>
										<th>Archivo3</th>
										<th>Id User</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calibracions as $calibracion)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $calibracion->id_cliente }}</td>
											<td>{{ $calibracion->fecha }}</td>
											<td>{{ $calibracion->archivo1 }}</td>
											<td>{{ $calibracion->observacion_piloto }}</td>
											<td>{{ $calibracion->observacion_cliente }}</td>
											<td>{{ $calibracion->archivo2 }}</td>
											<td>{{ $calibracion->archivo3 }}</td>
											<td>{{ $calibracion->id_user }}</td>

                                            <td>
                                                <form action="{{ route('calibracions.destroy',$calibracion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('calibracions.show',$calibracion->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('calibracions.edit',$calibracion->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $calibracions->links() !!}
            </div>
        </div>
    </div>
@endsection

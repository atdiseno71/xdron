@extends('layouts.app')

@section('title')
    Estacion Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estacion Servicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estacion-servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Nit</th>
										<th>Nombre</th>
										<th>Direccion</th>
										<th>Telefono</th>
										<th>Email</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estacionServicios as $estacionServicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $estacionServicio->nit }}</td>
											<td>{{ $estacionServicio->nombre }}</td>
											<td>{{ $estacionServicio->direccion }}</td>
											<td>{{ $estacionServicio->telefono }}</td>
											<td>{{ $estacionServicio->email }}</td>

                                            <td>
                                                <form action="{{ route('estacion-servicios.destroy',$estacionServicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('estacion-servicios.show',$estacionServicio->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estacion-servicios.edit',$estacionServicio->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $estacionServicios->links() !!}
            </div>
        </div>
    </div>
@endsection

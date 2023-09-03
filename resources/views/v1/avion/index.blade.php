@extends('layouts.app')

@section('title')
    Avion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Avion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('avions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Matricula</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Ano</th>
										<th>Serie</th>
										<th>Motor</th>
										<th>Horometro</th>
										<th>Alas</th>
										<th>Fuselage</th>
										<th>Helice</th>
										<th>Cola</th>
										<th>Hora Motor</th>
										<th>Centro Costo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($avions as $avion)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $avion->matricula }}</td>
											<td>{{ $avion->marca }}</td>
											<td>{{ $avion->modelo }}</td>
											<td>{{ $avion->ano }}</td>
											<td>{{ $avion->serie }}</td>
											<td>{{ $avion->motor }}</td>
											<td>{{ $avion->horometro }}</td>
											<td>{{ $avion->alas }}</td>
											<td>{{ $avion->fuselage }}</td>
											<td>{{ $avion->helice }}</td>
											<td>{{ $avion->cola }}</td>
											<td>{{ $avion->hora_motor }}</td>
											<td>{{ $avion->centro_costo }}</td>

                                            <td>
                                                <form action="{{ route('avions.destroy',$avion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('avions.show',$avion->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('avions.edit',$avion->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $avions->links() !!}
            </div>
        </div>
    </div>
@endsection

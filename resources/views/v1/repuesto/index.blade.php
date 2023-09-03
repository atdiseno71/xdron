@extends('layouts.app')

@section('title')
    Repuesto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Repuesto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('repuestos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Nombre</th>
										<th>Id Proveedor</th>
										<th>Id Pn</th>
										<th>Id Marca</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($repuestos as $repuesto)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $repuesto->nombre }}</td>
											<td>{{ $repuesto->id_proveedor }}</td>
											<td>{{ $repuesto->id_pn }}</td>
											<td>{{ $repuesto->id_marca }}</td>

                                            <td>
                                                <form action="{{ route('repuestos.destroy',$repuesto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('repuestos.show',$repuesto->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('repuestos.edit',$repuesto->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $repuestos->links() !!}
            </div>
        </div>
    </div>
@endsection

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

                    {{-- Plantilla mensajes--}}
                    @include('layouts.message')

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Servicio</th>
										<th>Fecha</th>
										<th>Cliente</th>
										<th>Finca</th>
										<th>Piloto</th>
										<th>Fecha creación</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operaciones as $operacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $operacion->servicio?->name }}</td>
											<td>{{ $operacion->fecha_ejecucion }}</td>
											<td>{{ $operacion->cliente?->user?->name }}</td>
											<td>{{ $operacion->finca?->name }}</td>
											<td>{{ $operacion->piloto?->name }}</td>
											<td>{{ $operacion->created_at?->format('Y-m-d') }}</td>

                                            <td>
                                                <form action="{{ route('operaciones.destroy',$operacion->id) }}" method="POST" class="form-delete">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('operaciones.show',$operacion->id) }}"><i class="fa fa-fw fa-eye"></i>{{--  {{ __('Show') }} --}}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('operaciones.edit',$operacion->id) }}"><i class="fa fa-fw fa-edit"></i>{{--  {{ __('Edit') }} --}}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>{{--  {{ __('Delete') }} --}}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $operaciones->appends(request()->except('page'))->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>

@endsection

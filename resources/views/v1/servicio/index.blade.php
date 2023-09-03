@extends('layouts.app')

@section('title')
    Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicio') }}
                            </span>

                            <div class="float-right">
                                @can('servicios.create')
                                    <a href="{{ route('servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                @endcan
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

										<th>Nombre</th>
                                        <th>Fecha creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicios as $servicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $servicio->name }}</td>
											<td>{{ $servicio->created_at }}</td>

                                            <td>
                                                <form action="{{ route('servicios.destroy',$servicio->id) }}" method="POST" class="form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('servicios.show')
                                                        <a class="btn btn-sm btn-primary " href="{{ route('servicios.show',$servicio->id) }}"><i class="fa fa-fw fa-eye"></i>{{--  --}}</a>
                                                    @endcan
                                                    @can('servicios.edit')
                                                        <a class="btn btn-sm btn-success" href="{{ route('servicios.edit',$servicio->id) }}"><i class="fa fa-fw fa-edit"></i>{{--  --}}</a>
                                                    @endcan
                                                    @can('servicios.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>{{--  --}}</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $servicios->appends(request()->except('page'))->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>

@endsection

@extends('layouts.app')

@section('title')
    Zona
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Zona') }}
                            </span>

                            <div class="float-right">
                                @can('zonas.create')
                                    <a href="{{ route('zonas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        Crear nuevo
                                    </a>
                                @endcan
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

										<th>Finca</th>
										<th>Nombre zona</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($zonas as $zona)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $zona->finca->name }}</td>
											<td>{{ $zona->name }}</td>

                                            <td>
                                                <form action="{{ route('zonas.destroy',$zona->id) }}" method="POST" class="form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('zonas.show')
                                                        <a class="btn btn-sm btn-primary " href="{{ route('zonas.show',$zona->id) }}"><i class="fa fa-fw fa-eye"></i>{{--  --}}</a>
                                                    @endcan
                                                    @can('zonas.edit')
                                                        <a class="btn btn-sm btn-success" href="{{ route('zonas.edit',$zona->id) }}"><i class="fa fa-fw fa-edit"></i>{{--  --}}</a>
                                                    @endcan
                                                    @can('zonas.destroy')
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
                {{ $zonas->appends(request()->except('page'))->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>

@endsection

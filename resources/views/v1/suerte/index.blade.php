@extends('layouts.app')

@section('title')
    Suerte
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Suerte') }}
                            </span>

                            <div class="float-right">
                                @can('suertes.create')
                                    <a href="{{ route('suertes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Zona</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suertes as $suerte)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $suerte->name }}</td>
											<td>{{ $suerte->zona?->name }}</td>

                                            <td>
                                                <form action="{{ route('suertes.destroy',$suerte->id) }}" method="POST" class="form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('suertes.show')
                                                        <a class="btn btn-sm btn-primary " href="{{ route('suertes.show',$suerte->id) }}"><i class="fa fa-fw fa-eye"></i>{{--  --}}</a>
                                                    @endcan
                                                    @can('suertes.edit')
                                                        <a class="btn btn-sm btn-success" href="{{ route('suertes.edit',$suerte->id) }}"><i class="fa fa-fw fa-edit"></i>{{--  --}}</a>
                                                    @endcan
                                                    @can('suertes.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
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
                {{ $suertes->appends(request()->except('page'))->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>

@endsection

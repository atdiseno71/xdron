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
                                Suerte
                            </span>

                            <div class="float-right">
                                @can('lucks.create')
                                    <a href="{{ route('lucks.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        Crear nuevo
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>

                    {{-- Plantilla mensajes --}}
                    @include('layouts.message')

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre</th>
                                        <th>Hacienda</th>
                                        <th>Creado por</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lucks as $luck)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $luck->name }}</td>
                                            <td>{{ $luck->estate?->name }}</td>
                                            <td>{{ $luck->creator?->name }}</td>

                                            <td>
                                                <form action="{{ route('lucks.destroy', $luck->id) }}" method="POST"
                                                    class="form-delete">
                                                    @can('lucks.show')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('lucks.show', $luck->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i></a>
                                                    @endcan
                                                    @can('lucks.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('lucks.edit', $luck->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i></a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('lucks.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i></button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $lucks->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>
@endsection

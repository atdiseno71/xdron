@extends('layouts.app')

@section('title')
    Dron
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Dron') }}
                        </span>

                        <div class="float-right">
                            @can('drons.create')
                                <a href="{{ route('drons.create') }}" class="btn btn-primary btn-sm float-right"
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

                                    <th>Matricula</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Creado por</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drons as $dron)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $dron->enrollment }}</td>
                                        <td>{{ $dron->brand }}</td>
                                        <td>{{ $dron->model }}</td>
                                        <td>{{ $dron->year }}</td>
                                        <td>{{ $dron->creator?->name }}</td>

                                        <td>
                                            <form action="{{ route('drons.destroy', $dron->id) }}" method="POST"
                                                class="form-delete">
                                                @can('drons.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('drons.show', $dron->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                @endcan
                                                @can('drons.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('drons.edit', $dron->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('drons.destroy')
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
                    {{ $drons->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>
@endsection

@extends('layouts.app')

@section('title')
    Hacienda
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Hacienda
                        </span>

                        <div class="float-right">
                            @can('estates.create')
                                <a href="{{ route('estates.create') }}" class="btn btn-primary btn-sm float-right"
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
                                    <th>Cliente</th>
                                    <th>Creado por</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estates as $estate)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $estate->name }}</td>
                                        <td>{{ $estate->client?->social_reason }}</td>
                                        <td>{{ $estate->creator?->name }}</td>

                                        <td>
                                            <form action="{{ route('estates.destroy', $estate->id) }}" method="POST"
                                                class="form-delete">
                                                @can('estates.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('estates.show', $estate->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                @endcan
                                                @can('estates.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('estates.edit', $estate->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @can('estates.destroy')
                                                    @method('DELETE')
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
                    {{ $estates->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>
@endsection

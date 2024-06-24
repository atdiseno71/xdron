@extends('layouts.app')

@section('title')
    Tipo producto
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Tipo producto
                        </span>

                        <div class="float-right">
                            @can('type-products.create')
                                <a href="{{ route('type-products.create') }}" class="btn btn-primary btn-sm float-right"
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
                                    <th>Creado por</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($typeProducts as $product)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->creator?->name }}</td>

                                        <td>
                                            <form action="{{ route('type-products.destroy', $product->id) }}" method="POST"
                                                class="form-delete">
                                                @can('type-products.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('type-products.show', $product->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                @endcan
                                                @can('type-products.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('type-products.edit', $product->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('type-products.destroy')
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
                    {{ $typeProducts->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>
@endsection

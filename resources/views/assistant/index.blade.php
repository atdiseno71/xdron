@extends('layouts.app')

@section('title')
    Asistentes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Asistentes
                            </span>

                            <div class="float-right">
                                @can('assistants.create')
                                    <a href="{{ route('assistants.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        Nuevo asistente
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
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th># Documento</th>
                                        <th>Creado por</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assistants as $assistant)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $assistant->name }}</td>
                                            <td>{{ $assistant->lastname }}</td>
                                            <td>{{ $assistant->phone }}</td>
                                            <td>{{ $assistant->email }}</td>
                                            <td>{{ $assistant->document_number }}</td>
                                            <td>{{ $assistant->user?->name }}</td>

                                            <td>
                                                <form action="{{ route('assistants.destroy', $assistant->id) }}"
                                                    method="POST" class="form-delete">
                                                    @can('assistants.show')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('assistants.show', $assistant->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i></a>
                                                    @endcan
                                                    @can('assistants.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('assistants.edit', $assistant->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i></a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('assistants.destroy')
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
                        {{ $assistants->appends(request()->except('page'))->links('vendor.pagination.custom') }}
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

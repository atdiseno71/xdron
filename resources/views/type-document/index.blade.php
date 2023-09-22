@extends('layouts.app')

@section('title')
    Type Document
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Type Document') }}
                            </span>

                            <div class="float-right">
                                @can('type-documents.create')
                                    <a href="{{ route('type-documents.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($typeDocuments as $typeDocument)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $typeDocument->name }}</td>

                                            <td>
                                                <form action="{{ route('type-documents.destroy', $typeDocument->id) }}"
                                                    method="POST">
                                                    @can('type-documents.show')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('type-documents.show', $typeDocument->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i></a>
                                                    @endcan
                                                    @can('type-documents.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('type-documents.edit', $typeDocument->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i></a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('type-documents.destroy')
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
                </div>
                {!! $typeDocuments->links() !!}
            </div>
        </div>
    </div>
@endsection

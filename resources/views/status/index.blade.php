@extends('layouts.app')

@section('title')
    Status
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Status') }}
                        </span>

                        <div class="float-right">
                            @can('statuses.create')
                                <a href="{{ route('statuses.create') }}" class="btn btn-primary btn-sm float-right"
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
                                    <th>Slug</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statuses as $status)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $status->name }}</td>
                                        <td>{{ $status->slug }}</td>

                                        <td>
                                            <form action="{{ route('statuses.destroy', $status->id) }}" method="POST">
                                                @can('statuses.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('statuses.show', $status->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                @endcan
                                                @can('statuses.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('statuses.edit', $status->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('statuses.destroy')
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
                    {{ $statuses->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection

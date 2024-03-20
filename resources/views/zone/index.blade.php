@extends('layouts.app')

@section('title')
    Zone
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Zone') }}
                        </span>

                        <div class="float-right">
                            @can('zones.create')
                                <a href="{{ route('zones.create') }}" class="btn btn-primary btn-sm float-right"
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
                                    <th>Observations</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zones as $zone)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $zone->name }}</td>
                                        <td>{{ $zone->observations }}</td>

                                        <td>
                                            <form action="{{ route('zones.destroy', $zone->id) }}" method="POST">
                                                @can('zones.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('zones.show', $zone->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                @endcan
                                                @can('zones.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('zones.edit', $zone->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('zones.destroy')
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
            {!! $zones->links() !!}
        </div>
    </div>
@endsection

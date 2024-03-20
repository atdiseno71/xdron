@extends('layouts.app')

@section('title')
    Detail Operation
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Detail Operation') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('detail-operations.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                Crear nuevo
                            </a>
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

                                    <th>Number Flights</th>
                                    <th>Hour Flights</th>
                                    <th>Acres</th>
                                    <th>Download</th>
                                    <th>Description</th>
                                    <th>Observation</th>
                                    <th>Estate Id</th>
                                    <th>Luck Id</th>
                                    <th>Zone Id</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detailOperations as $detailOperation)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $detailOperation->number_flights }}</td>
                                        <td>{{ $detailOperation->hour_flights }}</td>
                                        <td>{{ $detailOperation->acres }}</td>
                                        <td>{{ $detailOperation->download }}</td>
                                        <td>{{ $detailOperation->description }}</td>
                                        <td>{{ $detailOperation->observation }}</td>
                                        <td>{{ $detailOperation->estate_id }}</td>
                                        <td>{{ $detailOperation->luck_id }}</td>
                                        <td>{{ $detailOperation->zone_id }}</td>

                                        <td>
                                            <form action="{{ route('detail-operations.destroy', $detailOperation->id) }}"
                                                method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('detail-operations.show', $detailOperation->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i></a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('detail-operations.edit', $detailOperation->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $detailOperations->links() !!}
        </div>
    </div>
@endsection

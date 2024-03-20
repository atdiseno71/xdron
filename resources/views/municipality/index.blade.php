@extends('layouts.app')

@section('title')
    Municipality
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Municipality') }}
                        </span>

                        <div class="float-right">
                            @can('municipalities.create')
                                <a href="{{ route('municipalities.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    Crear nuevo
                                </a>
                            @endcan
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

                                    <th>Name</th>
                                    <th>Department Id</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($municipalities as $municipality)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $municipality->name }}</td>
                                        <td>{{ $municipality->department_id }}</td>

                                        <td>
                                            <form action="{{ route('municipalities.destroy', $municipality->id) }}"
                                                method="POST">
                                                @can('municipalities.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('municipalities.show', $municipality->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                @endcan
                                                @can('municipalities.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('municipalities.edit', $municipality->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('municipalities.destroy')
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
            {!! $municipalities->links() !!}
        </div>
    </div>
@endsection

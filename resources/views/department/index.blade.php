@extends('layouts.app')

@section('title')
    Department
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Department') }}
                        </span>

                        <div class="float-right">
                            @can('departments.create')
                                <a href="{{ route('departments.create') }}" class="btn btn-primary btn-sm float-right"
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

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $department->name }}</td>

                                        <td>
                                            <form action="{{ route('departments.destroy', $department->id) }}"
                                                method="POST">
                                                @can('departments.show')
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('departments.show', $department->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                @endcan
                                                @can('departments.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('departments.edit', $department->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('departments.destroy')
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
            {!! $departments->links() !!}
        </div>
    </div>
@endsection

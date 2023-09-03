@extends('layouts.app')

@section('title')
    Files Operation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Files Operation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('files-operations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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

										<th>Record</th>
										<th>Track</th>
										<th>Map</th>
										<th>Detail Operation Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filesOperations as $filesOperation)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $filesOperation->record }}</td>
											<td>{{ $filesOperation->track }}</td>
											<td>{{ $filesOperation->map }}</td>
											<td>{{ $filesOperation->detail_operation_id }}</td>

                                            <td>
                                                <form action="{{ route('files-operations.destroy',$filesOperation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('files-operations.show',$filesOperation->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('files-operations.edit',$filesOperation->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $filesOperations->links() !!}
            </div>
        </div>
    </div>
@endsection

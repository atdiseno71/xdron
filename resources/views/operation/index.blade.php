@extends('layouts.app')

@section('title')
    Operation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Operation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('operations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Download</th>
										<th>Observation Admin</th>
										<th>Observation Pilot</th>
										<th>Observation Assistant One</th>
										<th>Observation Assistant Two</th>
										<th>Type Product Id</th>
										<th>Assistant Id One</th>
										<th>Assistant Id Two</th>
										<th>Pilot Id</th>
										<th>Id Cliente</th>
										<th>Admin By</th>
										<th>Status Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operations as $operation)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $operation->download }}</td>
											<td>{{ $operation->observation_admin }}</td>
											<td>{{ $operation->observation_pilot }}</td>
											<td>{{ $operation->observation_assistant_one }}</td>
											<td>{{ $operation->observation_assistant_two }}</td>
											<td>{{ $operation->type_product_id }}</td>
											<td>{{ $operation->assistant_id_one }}</td>
											<td>{{ $operation->assistant_id_two }}</td>
											<td>{{ $operation->pilot_id }}</td>
											<td>{{ $operation->id_cliente }}</td>
											<td>{{ $operation->admin_by }}</td>
											<td>{{ $operation->status_id }}</td>

                                            <td>
                                                <form action="{{ route('operations.destroy',$operation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('operations.show',$operation->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('operations.edit',$operation->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $operations->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title')
    Luck
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Luck') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('lucks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Name</th>
										<th>Observations</th>
										<th>Estate Id</th>
										<th>Created By</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lucks as $luck)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $luck->name }}</td>
											<td>{{ $luck->observations }}</td>
											<td>{{ $luck->estate_id }}</td>
											<td>{{ $luck->created_by }}</td>

                                            <td>
                                                <form action="{{ route('lucks.destroy',$luck->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('lucks.show',$luck->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('lucks.edit',$luck->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $lucks->links() !!}
            </div>
        </div>
    </div>
@endsection

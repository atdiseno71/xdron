@extends('layouts.app')

@section('title')
    Dron
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dron') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('drons.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Enrollment</th>
										<th>Brand</th>
										<th>Model</th>
										<th>Year</th>
										<th>Created By</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drons as $dron)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $dron->enrollment }}</td>
											<td>{{ $dron->brand }}</td>
											<td>{{ $dron->model }}</td>
											<td>{{ $dron->year }}</td>
											<td>{{ $dron->created_by }}</td>

                                            <td>
                                                <form action="{{ route('drons.destroy',$dron->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('drons.show',$dron->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('drons.edit',$dron->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $drons->links() !!}
            </div>
        </div>
    </div>
@endsection

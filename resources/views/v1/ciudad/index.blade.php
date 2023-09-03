@extends('layouts.app')

@section('title')
    Ciudad
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ciudad') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ciudads.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ciudads as $ciudad)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $ciudad->nombre }}</td>

                                            <td>
                                                <form action="{{ route('ciudads.destroy',$ciudad->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ciudads.show',$ciudad->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ciudads.edit',$ciudad->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $ciudads->links() !!}
            </div>
        </div>
    </div>
@endsection

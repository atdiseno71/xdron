@extends('layouts.app')

@section('title')
    Asistentes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Asistentes
                            </span>

                             <div class="float-right">
                                <a href="{{ route('assistants.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Nuevo asistente
                                </a>
                              </div>
                        </div>
                    </div>

                    {{-- Plantilla mensajes--}}
                    @include('layouts.message')

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>Apellido</th>
										<th>Tipo documento</th>
										<th># Documento</th>
										<th>Creado por</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assistants as $assistant)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $assistant->name }}</td>
											<td>{{ $assistant->lastname }}</td>
											<td>{{ $assistant->type_document }}</td>
											<td>{{ $assistant->document_number }}</td>
											<td>{{ $assistant->user?->name }}</td>

                                            <td>
                                                <form action="{{ route('assistants.destroy',$assistant->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('assistants.show',$assistant->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('assistants.edit',$assistant->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                    <div class="card-footer">
                        {{ $assistants->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

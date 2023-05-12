@extends('layouts.app')

@section('template_title')
    Historial Archivos Creado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Historial Archivos Creado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('historial-archivos-creados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Directorio</th>
										<th>Nombre Archivo</th>
										<th>Id User</th>
										<th>Fecha Registro</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historialArchivosCreados as $historialArchivosCreado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $historialArchivosCreado->directorio }}</td>
											<td>{{ $historialArchivosCreado->nombre_archivo }}</td>
											<td>{{ $historialArchivosCreado->id_user }}</td>
											<td>{{ $historialArchivosCreado->fecha_registro }}</td>

                                            <td>
                                                <form action="{{ route('historial-archivos-creados.destroy',$historialArchivosCreado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('historial-archivos-creados.show',$historialArchivosCreado->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('historial-archivos-creados.edit',$historialArchivosCreado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $historialArchivosCreados->links() !!}
            </div>
        </div>
    </div>
@endsection

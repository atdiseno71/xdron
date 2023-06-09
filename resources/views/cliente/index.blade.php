@extends('layouts.app')

@section('template_title')
    Cliente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Clientes
                            </span>

                            <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    Asociar clientes
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

										<th>Nit</th>
										<th>Nombre</th>
										<th>Contacto</th>
										<th>Email</th>
										<th>Campos Nuevos</th>
										<th>Direccion</th>
										<th>Telefono</th>
										<th>Email Encargado</th>
										<th>Email1</th>
										<th>Email2</th>
										<th>Email3</th>
										<th>Id Finca</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $cliente->nit }}</td>
											<td>{{ $cliente->nombre }}</td>
											<td>{{ $cliente->contacto }}</td>
											<td>{{ $cliente->email }}</td>
											<td>{{ $cliente->campos_nuevos }}</td>
											<td>{{ $cliente->direccion }}</td>
											<td>{{ $cliente->telefono }}</td>
											<td>{{ $cliente->email_encargado }}</td>
											<td>{{ $cliente->email1 }}</td>
											<td>{{ $cliente->email2 }}</td>
											<td>{{ $cliente->email3 }}</td>
											<td>{{ $cliente->id_finca }}</td>

                                            <td>
                                                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $clientes->links() !!}
            </div>
        </div>
    </div>
@endsection

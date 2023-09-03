@extends('layouts.app')

@section('title')
    Operacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Operacion') }}
                            </span>

                             <div class="float-right">
                                @can('operaciones.create')
                                    <a href="{{ route('operaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                @endcan
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

										<th>Servicio</th>
										<th>Fecha</th>
										<th>Cliente</th>
										<th>Finca</th>
										<th>Piloto</th>
										<th>Fecha creación</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operaciones as $operacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $operacion->servicio?->name }}</td>
											<td>{{ $operacion->fecha_ejecucion }}</td>
											<td>{{ $operacion->cliente?->user?->name }}</td>
											<td>{{ $operacion->finca?->name }}</td>
											<td>{{ $operacion->piloto?->name }}</td>
											<td>{{ $operacion->created_at?->format('Y-m-d') }}</td>

                                            <td>
                                                <form action="{{ route('operaciones.destroy',$operacion->id) }}" method="POST" class="form-delete">
                                                    @can('operaciones.show')
                                                        <a class="btn btn-sm btn-primary " href="{{ route('operaciones.show',$operacion->id) }}" target="_blank">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.125 8.125H13.75V3.125C13.7495 2.62789 13.5517 2.15129 13.2002 1.79978C12.8487 1.44827 12.3721 1.25055 11.875 1.25H3.125C2.62789 1.25055 2.15129 1.44827 1.79978 1.79978C1.44827 2.15129 1.25055 2.62789 1.25 3.125V16.875C1.25055 17.3721 1.44827 17.8487 1.79978 18.2002C2.15129 18.5517 2.62789 18.7495 3.125 18.75H15.625C16.4535 18.749 17.2478 18.4195 17.8336 17.8336C18.4195 17.2478 18.749 16.4535 18.75 15.625V8.75C18.75 8.58424 18.6842 8.42527 18.5669 8.30806C18.4497 8.19085 18.2908 8.125 18.125 8.125ZM2.5 16.875V3.125C2.50015 2.95929 2.56604 2.8004 2.68322 2.68322C2.8004 2.56604 2.95929 2.50015 3.125 2.5H11.875C12.0407 2.50015 12.1996 2.56604 12.3168 2.68322C12.434 2.8004 12.4999 2.95929 12.5 3.125V17.5H3.125C2.95929 17.4999 2.8004 17.434 2.68322 17.3168C2.56604 17.1996 2.50015 17.0407 2.5 16.875V16.875ZM17.5 15.625C17.4995 16.1221 17.3017 16.5987 16.9502 16.9502C16.5987 17.3017 16.1221 17.4995 15.625 17.5H13.75V9.375H17.5V15.625Z" fill="white"/>
                                                                <path d="M10.2499 5.125L8.10326 6.7345L6.59657 5.73C6.49388 5.66163 6.37326 5.62514 6.24988 5.62514C6.12651 5.62514 6.00589 5.66163 5.9032 5.73L4.02819 6.98C3.95909 7.02517 3.89961 7.08358 3.8532 7.15186C3.8068 7.22014 3.77438 7.29693 3.75782 7.37781C3.74126 7.45869 3.74089 7.54205 3.75673 7.62308C3.77256 7.7041 3.8043 7.78119 3.8501 7.84988C3.89589 7.91857 3.95484 7.97751 4.02355 8.02329C4.09225 8.06907 4.16934 8.10078 4.25037 8.1166C4.3314 8.13241 4.41476 8.13202 4.49563 8.11544C4.57651 8.09886 4.6533 8.06642 4.72157 8.02L6.24988 7.00106L7.7782 8.01981C7.88568 8.09181 8.01289 8.12858 8.1422 8.12503C8.27152 8.12148 8.39652 8.07778 8.49989 8L10.9999 6.125C11.0656 6.07575 11.1209 6.01406 11.1627 5.94343C11.2045 5.87281 11.232 5.79464 11.2436 5.71339C11.2552 5.63214 11.2507 5.54939 11.2303 5.46989C11.21 5.39038 11.1741 5.31566 11.1249 5.25C11.0756 5.18434 11.0139 5.12902 10.9433 5.0872C10.8727 5.04539 10.7945 5.01789 10.7133 5.00628C10.632 4.99467 10.5493 4.99918 10.4698 5.01955C10.3903 5.03992 10.3156 5.07575 10.2499 5.125V5.125Z" fill="white"/>
                                                                <path d="M4.375 11.875H7.5C7.66576 11.875 7.82473 11.8092 7.94194 11.6919C8.05915 11.5747 8.125 11.4158 8.125 11.25C8.125 11.0842 8.05915 10.9253 7.94194 10.8081C7.82473 10.6908 7.66576 10.625 7.5 10.625H4.375C4.20924 10.625 4.05027 10.6908 3.93306 10.8081C3.81585 10.9253 3.75 11.0842 3.75 11.25C3.75 11.4158 3.81585 11.5747 3.93306 11.6919C4.05027 11.8092 4.20924 11.875 4.375 11.875Z" fill="white"/>
                                                                <path d="M10 13.125H4.375C4.20924 13.125 4.05027 13.1908 3.93306 13.3081C3.81585 13.4253 3.75 13.5842 3.75 13.75C3.75 13.9158 3.81585 14.0747 3.93306 14.1919C4.05027 14.3092 4.20924 14.375 4.375 14.375H10C10.1658 14.375 10.3247 14.3092 10.4419 14.1919C10.5592 14.0747 10.625 13.9158 10.625 13.75C10.625 13.5842 10.5592 13.4253 10.4419 13.3081C10.3247 13.1908 10.1658 13.125 10 13.125Z" fill="white"/>
                                                            </svg>
                                                        </a>
                                                    @endcan
                                                    @can('operaciones.edit')
                                                        <a class="btn btn-sm btn-success" href="{{ route('operaciones.edit',$operacion->id) }}"><i class="fa fa-fw fa-edit"></i>{{--  --}}</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('operaciones.destroy')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>{{--  --}}</button>
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
                {{ $operaciones->appends(request()->except('page'))->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>

@endsection

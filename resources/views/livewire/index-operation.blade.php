<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">


                <div class="row">
                    <div class="col-md-5">
                        <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal" data-target="#FilterOperation">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="6.08698" y="9.13043" width="15.8261" height="1.82609" rx="0.913043"
                                    fill="white" />
                                <rect x="6.08698" y="14" width="15.8261" height="1.82609" rx="0.913043"
                                    fill="white" />
                                <rect x="6.08698" y="18.8695" width="15.8261" height="1.82609" rx="0.913043"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                    @php
                        $operationsJson = $operations_collection;
                    @endphp
                    <div class="col-md-2">
                        @if ($is_root || $is_pilot)
                            <a target="_blank"
                                href="{{ route('downloadExcelOperacion', ['cXVlcnk' => $operationsJson]) }}"
                                class="dt-button buttons-excel buttons-html5 btn btn-success" data-placement="left">
                                <span>Excel <i class="fas fa-file-excel"></i></span>
                            </a>
                        @endif
                    </div>
                    <div class="col-md-5">
                        @can('operations.create')
                            <a href="{{ route('operations.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                Crear nuevo
                            </a>
                        @endcan
                    </div>
                </div>

            </div>

            {{-- Plantilla mensajes --}}
            @include('layouts.message')

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table_3 table-striped table-hover" cellspacing="0" width="100%"
                        style="font-size: .7rem">
                        <thead class="thead" style="text-transform: uppercase;">
                            <tr>
                                <th>No</th>
                                {{-- <th></th> --}}
                                <th>Fecha Aplic</th>
                                @if ($is_root)
                                    <th>Piloto</th>
                                @endif
                                <th>TANQ</th>
                                <th>TANQ 2</th>
                                <th>Dron</th>
                                <th>Cliente</th>
                                <th>T. Aplic</th>
                                <th>Desc LTS</th>
                                <th>Zona</th>

                                <th>Tot Has</th>
                                <th>Hda</th>
                                <th>Ste</th>

                                @if ($is_root)
                                    <th>Tot Bat/Vls</th>
                                    <th>Tot Hrs</th>
                                @endif
                                <th>Has/hrs</th>
                                <th>Has/bat</th>

                                {{-- <th>Observación</th> --}}
                                <th>Fecha prog</th>
                                <th>Estado</th>
                                <th colspan="2">
                                    @can('operations.edit')
                                        Acciones
                                    @endcan
                                </th>
                                <th colspan="3">Archivos</th>
                                <th>Administrador</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                {{-- BEGIN:TOTAL HECTAREAS --}}
                                <td colspan="9"></td>
                                <td><strong>TOT HAS</strong></td>
                                <td></td>
                                {{-- END:TOTAL HECTAREAS --}}
                                @if ($is_root)
                                    {{-- BEGIN:TOTAL BATERIAS --}}
                                    <td><strong>TOT Bat/Vls</strong></td>
                                    <td></td>
                                    {{-- END:TOTAL BATERIAS --}}
                                    {{-- BEGIN:TOTAL HORAS VUELVO --}}
                                    <td><strong>TOT HRS</strong></td>
                                    {{-- END:TOTAL HORAS VUELVO --}}
                                    {{-- BEGIN:TOTAL HECTAREAS/HORAS --}}
                                    <td><strong>TOT HAS/HRS</strong></td>
                                    {{-- END:TOTAL HECTAREAS/HORAS --}}
                                    {{-- BEGIN:TOTAL HECTAREAS/BATERIAS --}}
                                    <td><strong>TOT HAS/BAT</strong></td>
                                    <td colspan="7"></td>
                                    {{-- END:TOTAL HECTAREAS/BATERIAS --}}
                                @else
                                    <td colspan="{{ $is_client ? '12' : '13' }}"></td>
                                @endif
                            </tr>
                            <tr>
                                {{-- BEGIN:TOTAL HECTAREAS --}}
                                <td colspan="9"></td>
                                <td>{{ $hectares }}</td>
                                <td></td>
                                {{-- END:TOTAL HECTAREAS --}}
                                @if ($is_root)
                                    {{-- BEGIN:TOTAL BATERIAS --}}
                                    <td>{{ $batteries }}</td>
                                    <td></td>
                                    {{-- END:TOTAL BATERIAS --}}
                                    {{-- BEGIN:TOTAL HORAS VUELVO --}}
                                    <td>{{ $flight_hours }}</td>
                                    {{-- END:TOTAL HORAS VUELVO --}}
                                    {{-- BEGIN:TOTAL HECTAREAS/HORAS --}}
                                    <td>{{ $hectares_hours }}</td>
                                    {{-- END:TOTAL HECTAREAS/HORAS --}}
                                    {{-- BEGIN:TOTAL HECTAREAS/BATERIAS --}}
                                    <td>{{ $hectares_batteries }}</td>
                                    <td colspan="7"></td>
                                    {{-- END:TOTAL HECTAREAS/BATERIAS --}}
                                @else
                                    <td colspan="{{ $is_client ? '11' : '12' }}"></td>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($operations as $key => $operation)
                                @php
                                    $number_flights = $operation->number_flights;
                                    $hour_flights = $operation->hour_flights;
                                    $acres = 0;
                                    foreach ($operation->details as $detail) {
                                        $acres += $detail->acres;
                                    }
                                    /* Hectareas/horas */
                                    if ($hour_flights != 0) {
                                        $divide1 = number_format($acres / $hour_flights, 2, ',', ' ');
                                    } else {
                                        $divide1 = 0;
                                    }
                                    /* Hectareas/Baterias */
                                    if ($number_flights != 0) {
                                        $divide2 = number_format($acres / $number_flights, 2, ',', ' ');
                                    } else {
                                        $divide2 = 0;
                                    }
                                    // nombres de las haciendas
                                    $names_states = '';
                                    $names_lucks = '';
                                    foreach ($operation->details as $index => $detail) {
                                        $names_states .= $detail->estate?->name;
                                        $names_lucks .= $detail->luck;
                                        if (!$loop->last) {
                                            $names_states .= ', ';
                                            $names_lucks .= ', ';
                                        }
                                    }

                                    // Datos para las tablas
                                    $date_operation = $operation->date_operation?->format('d/m/Y');
                                    $name_pilot = $operation->user_pilot?->name;
                                    $name_assistant_one = $operation->assistant_one?->name;
                                    $name_assistant_two = $operation->assistant_two?->name;
                                    $drone_enrollment = $operation->drone->enrollment ?? 'Sin vuelos.';
                                    $client_name = $operation->client?->social_reason;
                                    $product_name = $operation->product?->name;
                                    $download = $operation->download;
                                @endphp
                                <tr>

                                    <td>{{ $operation->consecutive }}</td>
                                    {{-- <td>
                                        <button
                                            wire:click="$emitTo('operation-modal', 'display-modal', {{ $operation->id }})"
                                            type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#formLuck">
                                            <svg width="29" height="30" viewBox="0 0 29 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z"
                                                    fill="#FCFCFC" />
                                                <path
                                                    d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z"
                                                    fill="#FCFCFC" />
                                            </svg>
                                        </button>
                                    </td> --}}

                                    <td title="{{ $date_operation }}">{{ $date_operation }}</td>
                                    @if ($is_root)
                                        <td title="{{ $name_pilot }}">{{ $name_pilot }}</td>
                                    @endif
                                    <td title="{{ $name_assistant_one }}">{{ $name_assistant_one }}</td>
                                    <td title="{{ $name_assistant_two }}">{{ $name_assistant_two }}</td>
                                    <td title="{{ $drone_enrollment }}">{{ $drone_enrollment }}</td>
                                    <td title="{{ $client_name }}">{{ $client_name }}</td>
                                    <td title="{{ $product_name }}">{{ $product_name }}</td>
                                    <td title="{{ $download }}">{{ $download }}</td>

                                    <td title="{{ $operation->zone?->name }}">{{ $operation->zone?->name }}</td>
                                    <td title="{{ $acres }}">{{ $acres }}</td>
                                    <td title="{{ $names_states }}">
                                        {{ $names_states }}
                                    </td>
                                    <td title="{{ $names_lucks }}">
                                        {{ $names_lucks }}
                                    </td>

                                    @if ($is_root)
                                        <td>{{ $number_flights }}</td>
                                        <td>{{ $hour_flights }}</td>
                                    @endif

                                    <td>{{ $divide1 }}</td>
                                    <td>{{ $divide2 }}</td>

                                    <td>{{ $operation->created_at?->format('d/m/Y') }}</td>
                                    <td class="{{ $operation->status_id == 4 ? 'text-green' : 'text-red' }}">{{ $operation->status?->name ?? 'Sin vuelos.' }}</td>

                                    <td>
                                        @can('operations.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('operations.edit', $operation->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                        @endcan
                                    </td>

                                    <td>
                                        <form action="{{ route('operations.destroy', $operation->id) }}"
                                            method="POST" class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            @can('operations.destroy')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i></button>
                                            @endcan
                                        </form>
                                    </td>

                                    <td>
                                        @can('operations.show')
                                            <a class="btn btn-sm btn-primary text-white btn-actions d-flex align-items-center gap-1" target="_blank"
                                                href="{{ route('operations.show', $operation->id) }}">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.125 8.125H13.75V3.125C13.7495 2.62789 13.5517 2.15129 13.2002 1.79978C12.8487 1.44827 12.3721 1.25055 11.875 1.25H3.125C2.62789 1.25055 2.15129 1.44827 1.79978 1.79978C1.44827 2.15129 1.25055 2.62789 1.25 3.125V16.875C1.25055 17.3721 1.44827 17.8487 1.79978 18.2002C2.15129 18.5517 2.62789 18.7495 3.125 18.75H15.625C16.4535 18.749 17.2478 18.4195 17.8336 17.8336C18.4195 17.2478 18.749 16.4535 18.75 15.625V8.75C18.75 8.58424 18.6842 8.42527 18.5669 8.30806C18.4497 8.19085 18.2908 8.125 18.125 8.125ZM2.5 16.875V3.125C2.50015 2.95929 2.56604 2.8004 2.68322 2.68322C2.8004 2.56604 2.95929 2.50015 3.125 2.5H11.875C12.0407 2.50015 12.1996 2.56604 12.3168 2.68322C12.434 2.8004 12.4999 2.95929 12.5 3.125V17.5H3.125C2.95929 17.4999 2.8004 17.434 2.68322 17.3168C2.56604 17.1996 2.50015 17.0407 2.5 16.875V16.875ZM17.5 15.625C17.4995 16.1221 17.3017 16.5987 16.9502 16.9502C16.5987 17.3017 16.1221 17.4995 15.625 17.5H13.75V9.375H17.5V15.625Z"
                                                        fill="white" />
                                                    <path
                                                        d="M10.2499 5.125L8.10326 6.7345L6.59657 5.73C6.49388 5.66163 6.37326 5.62514 6.24988 5.62514C6.12651 5.62514 6.00589 5.66163 5.9032 5.73L4.02819 6.98C3.95909 7.02517 3.89961 7.08358 3.8532 7.15186C3.8068 7.22014 3.77438 7.29693 3.75782 7.37781C3.74126 7.45869 3.74089 7.54205 3.75673 7.62308C3.77256 7.7041 3.8043 7.78119 3.8501 7.84988C3.89589 7.91857 3.95484 7.97751 4.02355 8.02329C4.09225 8.06907 4.16934 8.10078 4.25037 8.1166C4.3314 8.13241 4.41476 8.13202 4.49563 8.11544C4.57651 8.09886 4.6533 8.06642 4.72157 8.02L6.24988 7.00106L7.7782 8.01981C7.88568 8.09181 8.01289 8.12858 8.1422 8.12503C8.27152 8.12148 8.39652 8.07778 8.49989 8L10.9999 6.125C11.0656 6.07575 11.1209 6.01406 11.1627 5.94343C11.2045 5.87281 11.232 5.79464 11.2436 5.71339C11.2552 5.63214 11.2507 5.54939 11.2303 5.46989C11.21 5.39038 11.1741 5.31566 11.1249 5.25C11.0756 5.18434 11.0139 5.12902 10.9433 5.0872C10.8727 5.04539 10.7945 5.01789 10.7133 5.00628C10.632 4.99467 10.5493 4.99918 10.4698 5.01955C10.3903 5.03992 10.3156 5.07575 10.2499 5.125V5.125Z"
                                                        fill="white" />
                                                    <path
                                                        d="M4.375 11.875H7.5C7.66576 11.875 7.82473 11.8092 7.94194 11.6919C8.05915 11.5747 8.125 11.4158 8.125 11.25C8.125 11.0842 8.05915 10.9253 7.94194 10.8081C7.82473 10.6908 7.66576 10.625 7.5 10.625H4.375C4.20924 10.625 4.05027 10.6908 3.93306 10.8081C3.81585 10.9253 3.75 11.0842 3.75 11.25C3.75 11.4158 3.81585 11.5747 3.93306 11.6919C4.05027 11.8092 4.20924 11.875 4.375 11.875Z"
                                                        fill="white" />
                                                    <path
                                                        d="M10 13.125H4.375C4.20924 13.125 4.05027 13.1908 3.93306 13.3081C3.81585 13.4253 3.75 13.5842 3.75 13.75C3.75 13.9158 3.81585 14.0747 3.93306 14.1919C4.05027 14.3092 4.20924 14.375 4.375 14.375H10C10.1658 14.375 10.3247 14.3092 10.4419 14.1919C10.5592 14.0747 10.625 13.9158 10.625 13.75C10.625 13.5842 10.5592 13.4253 10.4419 13.3081C10.3247 13.1908 10.1658 13.125 10 13.125Z"
                                                        fill="white" />
                                                </svg>
                                                Info
                                            </a>
                                        @endcan
                                    </td>

                                    <td>
                                        @if ($is_root || $is_client)
                                            <a class="btn btn-sm btn-warning text-white btn-actions d-flex align-items-center gap-1"
                                                href="{{ route('operations.downloadzip', ['id' => $operation->id, 'type' => 'downloadzip']) }}">
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.983 8.64168C18.9046 8.545 18.8055 8.46712 18.693 8.41376C18.5805 8.3604 18.4575 8.33293 18.333 8.33335H16.6663V7.50002C16.6663 6.83698 16.4029 6.20109 15.9341 5.73225C15.4653 5.26341 14.8294 5.00002 14.1663 5.00002H8.93301L8.66634 4.16669C8.49347 3.67771 8.1728 3.2546 7.74876 2.95599C7.32472 2.65737 6.8183 2.49802 6.29967 2.50002H3.33301C2.66997 2.50002 2.03408 2.76341 1.56524 3.23225C1.0964 3.70109 0.833008 4.33698 0.833008 5.00002V15C0.833008 15.6631 1.0964 16.2989 1.56524 16.7678C2.03408 17.2366 2.66997 17.5 3.33301 17.5H15.333C15.9007 17.4984 16.4509 17.3036 16.8931 16.9476C17.3354 16.5917 17.6433 16.0959 17.7663 15.5417L19.1663 9.35002C19.1917 9.22578 19.1883 9.0974 19.1566 8.97465C19.1248 8.85191 19.0654 8.73803 18.983 8.64168ZM4.47467 15.1833C4.43234 15.3713 4.32617 15.5388 4.17423 15.6574C4.02229 15.7759 3.83398 15.8381 3.64134 15.8334H3.33301C3.11199 15.8334 2.90003 15.7456 2.74375 15.5893C2.58747 15.433 2.49967 15.221 2.49967 15V5.00002C2.49967 4.779 2.58747 4.56704 2.74375 4.41076C2.90003 4.25448 3.11199 4.16669 3.33301 4.16669H6.29967C6.4814 4.1572 6.66123 4.20746 6.8117 4.30978C6.96218 4.4121 7.07502 4.56087 7.13301 4.73335L7.58301 6.10002C7.63648 6.25897 7.73667 6.39809 7.87048 6.49919C8.00429 6.60029 8.16549 6.65867 8.33301 6.66668H14.1663C14.3874 6.66668 14.5993 6.75448 14.7556 6.91076C14.9119 7.06704 14.9997 7.279 14.9997 7.50002V8.33335H6.66634C6.47371 8.32864 6.28539 8.39084 6.13345 8.50935C5.98151 8.62786 5.87534 8.79537 5.83301 8.98335L4.47467 15.1833ZM16.1413 15.1833C16.099 15.3713 15.9928 15.5388 15.8409 15.6574C15.689 15.7759 15.5006 15.8381 15.308 15.8334H6.00801C6.05105 15.7405 6.08186 15.6425 6.09967 15.5417L7.33301 10H17.333L16.1413 15.1833Z"
                                                        fill="#FCFCFC" />
                                                </svg>
                                                GPS
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($is_root || $is_client)
                                            <a class="btn btn-sm btn-secondary text-white btn-actions d-flex align-items-center gap-1"
                                                href="{{ route('operations.downloadpdf', ['id' => $operation->id, 'type' => 'downloadpdf']) }}"><i class="fa fa-fw fa-file-pdf"></i>PDF
                                            </a>
                                        @endif
                                    </td>

                                    <td class="text-center">{{ $operation->userAdmin?->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            {{ Form::label('hectares', 'Total Hectareas') }}
                            {{ Form::text('hectares', $hectares, ['class' => 'form-control' . ($errors->has('hectares') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Total Hectareas']) }}
                            {!! $errors->first('hectares', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            {{ Form::label('batteries', 'Total Baterias') }}
                            {{ Form::text('batteries', $batteries, ['class' => 'form-control' . ($errors->has('batteries') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Total Baterias']) }}
                            {!! $errors->first('batteries', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            {{ Form::label('flight_hours', 'Total Horas Vuelos') }}
                            {{ Form::text('flight_hours', $flight_hours, ['class' => 'form-control' . ($errors->has('flight_hours') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Total Horas Vuelos']) }}
                            {!! $errors->first('flight_hours', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            {{ Form::label('hectares_hours', 'Total Hectareas/Horas') }}
                            {{ Form::text('hectares_hours', $hectares_hours, ['class' => 'form-control' . ($errors->has('hectares_hours') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Total Horas Vuelos']) }}
                            {!! $errors->first('hectares_hours', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            {{ Form::label('hectares_batteries', 'Total Hectareas/Baterias') }}
                            {{ Form::text('hectares_batteries', $hectares_batteries, ['class' => 'form-control' . ($errors->has('hectares_batteries') ? ' is-invalid' : ''), 'disabled' => 'disabled', 'placeholder' => 'Total Horas Vuelos']) }}
                            {!! $errors->first('hectares_batteries', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
            </div> --}}
                <div class="card-footer">
                    {{ $operations->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
    @include('modals.filters_operation')

    @livewire('operation-modal')

    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>

    <script>
        function toggleColumnsOnLoad() {
            document.querySelectorAll(".toggle-column").forEach(checkbox => {
                let column = checkbox.getAttribute("data-column");
                let table = document.querySelector(".table_3");

                table.querySelectorAll("tr").forEach(row => {
                    let cell = row.children[column];
                    if (cell) {
                        cell.classList.toggle("hidden", !checkbox.checked);
                    }
                });
            });
        }

        // Se ejecuta inmediatamente antes de que la página se muestre
        toggleColumnsOnLoad();

        // Agrega los eventos después de que el DOM cargue
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".toggle-column").forEach(function(checkbox) {
                checkbox.addEventListener("change", function() {
                    let column = this.getAttribute("data-column");
                    let table = document.querySelector(".table_3");

                    table.querySelectorAll("tr").forEach(row => {
                        let cell = row.children[column];
                        if (cell) {
                            cell.classList.toggle("hidden", !this.checked);
                        }
                    });
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            $(document).on('change', '#date_start, #date_end, #client, #type_product, #user, #enrollment, #assistent_one, #assistent_two, #estate', function(e) {
                document.getElementById('closeModal').click();
            });
        });
    </script>

<!-- Modal -->
<div class="modal fade" id="formDron" tabindex="-1" role="dialog" aria-labelledby="formDronLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formDronLabel">Registrar nuevo Dron</h4>
                <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> --}}
            </div>
            <div class="modal-body">
                <!-- Aquí coloca el formulario del modal -->
                <form method="POST" action="{{ route('drons.uploadDron') }}" role="form"
                    enctype="multipart/form-data" id="formDron">
                    @csrf

                    <div class="box box-info padding-1">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('enrollment', 'Matricula') }}
                                        {{ Form::text('enrollment', '', ['class' => 'form-control' . ($errors->has('enrollment') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la matricula']) }}
                                        {!! $errors->first('enrollment', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('brand', 'Marca') }}
                                        {{ Form::text('brand', '', ['class' => 'form-control' . ($errors->has('brand') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese la marca']) }}
                                        {!! $errors->first('brand', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('model', 'Modelo') }}
                                        {{ Form::text('model', '', ['class' => 'form-control' . ($errors->has('model') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el modelo']) }}
                                        {!! $errors->first('model', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('year', 'Año') }}
                                        {{-- {{ Form::text('year', $dron->year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el año']) }} --}}
                                        {{ Form::select('year', range(date('Y') - 30, date('Y') + 10), '', ['class' => 'form-control ' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el año']) }}
                                        {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        @include('layouts.btn-submit')
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formEstate" tabindex="-1" role="dialog" aria-labelledby="formEstateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formEstateLabel">Registrar nueva hacienda</h4>
                <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> --}}
            </div>
            <div class="modal-body">
                <!-- Aquí coloca el formulario del modal -->
                <form method="POST" action="{{ route('estates.uploadEstate') }}" role="form"
                    enctype="multipart/form-data" id="formEstate">
                    @csrf

                    <div class="box box-info padding-1">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('name', 'Nombre') }}
                                        {{ Form::text('name', '', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un nombre']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('cliente_id', 'Clientes') }}
                                        {{ Form::select('cliente_id', $clients, $operation->id_cliente, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el cliente']) }}
                                        {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('observations') }}
                                        {{ Form::textArea('observations', '', ['class' => 'form-control' . ($errors->has('observations') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                                        {!! $errors->first('observations', '<div class="invalid-feedback">:message</div>') !!}
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

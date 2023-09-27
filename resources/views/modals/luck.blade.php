<!-- Modal -->
<div class="modal fade" id="formLuck" tabindex="-1" role="dialog" aria-labelledby="formLuckLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formLuckLabel">Registrar nueva suerte</h4>
                <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> --}}
            </div>
            <div class="modal-body">
                <!-- Aquí coloca el formulario del modal -->
                <form method="POST" action="{{ route('lucks.uploadLuck') }}" role="form"
                    enctype="multipart/form-data" id="formLuck">
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
                                        {{ Form::label('estate_id', 'Hacienda') }}
                                        {{ Form::select('estate_id', $estates, $detail_operation->luck_id, ['class' => 'form-control' . ($errors->has('estate_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una hacienda']) }}
                                        {!! $errors->first('estate_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('observations', 'Observaciones') }}
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

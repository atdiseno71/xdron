<!-- Modal -->
<div class="modal fade" id="formAsistent" tabindex="-1" role="dialog" aria-labelledby="formAsistentLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formAsistentLabel">Registrar nuevo asistente</h4>
                <button type="button" id="closeModalAsistent" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí coloca el formulario del modal -->
                <form method="POST" action="{{ route('assistants.uploadAsistent') }}" role="form"
                    enctype="multipart/form-data" id="formAsistentUser">
                    @csrf
                    <div class="box box-info padding-1">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="type_document">Tipo de documento</label>
                                        <div class="custom-radio">
                                            @foreach ($types_documents as $key => $value)
                                                <input type="radio" id="{{ $key }}" name="type_document" value="{{ $key }}">
                                                <label for="customTipo1">{{ $value }}</label>
                                                <br>
                                            @endforeach
                                        </div>
                                        {!! $errors->first('type_document', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('document_number', '# Documento') }}
                                        {{ Form::number('document_number', '', ['class' => 'form-control' . ($errors->has('document_number') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese número de documento']) }}
                                        {!! $errors->first('document_number', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('name', 'Nombre') }}
                                        {{ Form::text('name', '', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingresar nombre']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('lastname', 'Apellido') }}
                                        {{ Form::text('lastname', '', ['class' => 'form-control' . ($errors->has('lastname') ? ' is-invalid' : ''), 'placeholder' => 'Ingresar apellido']) }}
                                        {!! $errors->first('lastname', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('phone', 'Número de telefono') }}
                                        {{ Form::number('phone', '', ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Número de telefono']) }}
                                        {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('email', 'Correo electrónico') }}
                                        {{ Form::email('email', '', ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
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

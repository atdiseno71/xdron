<!-- Modal -->
<div class="modal fade" id="formCliente" tabindex="-1" role="dialog" aria-labelledby="formClienteLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formClienteLabel">Registrar nuevo cliente</h4>
                <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button> --}}
            </div>
            <div class="modal-body">
                <!-- Aquí coloca el formulario del modal -->
                <form method="POST" action="{{ route('clients.uploadClient') }}" role="form"
                    enctype="multipart/form-data" id="formClienteUser">
                    @csrf

                    <div class="box box-info padding-1">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('nit', 'NIT') }}
                                        {{ Form::text('nit', '', ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''), 'placeholder' => 'Nit']) }}
                                        {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('social_reason', 'Razón social') }}
                                        {{ Form::text('social_reason', '', ['class' => 'form-control' . ($errors->has('social_reason') ? ' is-invalid' : ''), 'placeholder' => 'Razón social']) }}
                                        {!! $errors->first('social_reason', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('address', 'Dirección') }}
                                        {{ Form::text('address', '', ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Dirección']) }}
                                        {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('phone', 'Telefono') }}
                                        {{ Form::text('phone', '', ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                                        {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('email_enterprise', 'Email de la empresa #1') }}
                                        {{ Form::email('email_enterprise', '', ['class' => 'form-control' . ($errors->has('email_enterprise') ? ' is-invalid' : ''), 'placeholder' => 'Email de la empresa #1']) }}
                                        {!! $errors->first('email_enterprise', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('email_enterprise2', 'Email de la empresa #2') }}
                                        {{ Form::email('email_enterprise2', '', ['class' => 'form-control' . ($errors->has('email_enterprise2') ? ' is-invalid' : ''), 'placeholder' => 'Email de la empresa #2']) }}
                                        {!! $errors->first('email_enterprise2', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('email_user', 'Email del usuario') }}
                                        {{ Form::email('email_user', '', ['class' => 'form-control' . ($errors->has('email_user') ? ' is-invalid' : ''), 'placeholder' => 'Email del usuario']) }}
                                        {!! $errors->first('email_user', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('full_name_user', 'Nombre completo') }}
                                        {{ Form::text('full_name_user', '', ['class' => 'form-control' . ($errors->has('full_name_user') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo del cliente']) }}
                                        {!! $errors->first('full_name_user', '<div class="invalid-feedback">:message</div>') !!}
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

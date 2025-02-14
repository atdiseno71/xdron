<!-- Modal -->
<div class="modal fade" id="FilterOperation" tabindex="-1" role="dialog" aria-labelledby="FilterOperationLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="FilterOperationLabel">Filtros de Operaciones</h4>
                <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="box box-info padding-1">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('date_start', 'Fecha inicial') }}
                                    {{ Form::date('date_start', '', ['class' => 'form-control' . ($errors->has('date_start') ? ' is-invalid' : ''), 'wire:model' => 'dateStart', 'placeholder' => 'Ingrese un nombre']) }}
                                    {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('date_end', 'Fecha Final') }}
                                    {{ Form::date('date_end', '', ['class' => 'form-control' . ($errors->has('date_end') ? ' is-invalid' : ''), 'wire:model' => 'dateEnd', 'placeholder' => 'Ingrese un nombre']) }}
                                    {!! $errors->first('date_end', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('client', 'Cliente') }}
                                    {{ Form::select('client', $clients, '', ['class' => 'form-control' . ($errors->has('client') ? ' is-invalid' : ''), 'wire:model' => 'client', 'placeholder' => 'Seleccione el cliente']) }}
                                    {!! $errors->first('client', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('type_product', 'Tipo aplicación') }}
                                    {{ Form::select('type_product', $type_products, '', ['class' => 'form-control' . ($errors->has('type_product') ? ' is-invalid' : ''), 'wire:model' => 'typeProduct', 'placeholder' => 'Seleccione el tipo aplicación']) }}
                                    {!! $errors->first('type_product', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('user', 'Piloto') }}
                                    {{ Form::select('user', $pilots, '', ['class' => 'form-control' . ($errors->has('user') ? ' is-invalid' : ''), 'wire:model' => 'user', 'placeholder' => 'Seleccione el piloto']) }}
                                    {!! $errors->first('user', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('enrollment', 'Dron') }}
                                    {{ Form::select('enrollment', $enrollments, '', ['class' => 'form-control' . ($errors->has('enrollment') ? ' is-invalid' : ''), 'wire:model' => 'enrollment', 'placeholder' => 'Seleccione la matricula']) }}
                                    {!! $errors->first('enrollment', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('assistent_one', 'Tanqueador 1') }}
                                    {{ Form::select('assistent_one', $assistents, '', ['class' => 'form-control' . ($errors->has('assistent_one') ? ' is-invalid' : ''), 'wire:model' => 'assistent_one', 'placeholder' => 'Seleccione el tanqueador 1']) }}
                                    {!! $errors->first('assistent_one', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('assistent_two', 'Tanqueador 2') }}
                                    {{ Form::select('assistent_two', $assistents, '', ['class' => 'form-control' . ($errors->has('assistent_two') ? ' is-invalid' : ''), 'wire:model' => 'assistent_two', 'placeholder' => 'Seleccione el tanqueador 2']) }}
                                    {!! $errors->first('assistent_two', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('estate', 'Hacienda') }}
                                    {{ Form::select('estate', $estates, '', ['class' => 'form-control' . ($errors->has('estate') ? ' is-invalid' : ''), 'wire:model' => 'estate', 'placeholder' => 'Seleccione una hacienda']) }}
                                    {!! $errors->first('estate', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                        </div>
                        @unless ($is_client)
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="0" checked>
                                        <label class="form-check-label"> No</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="1" checked>
                                        <label class="form-check-label"> Fecha Aplic</label>
                                    </div>
                                    @if ($is_root)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input toggle-column" data-column="2"
                                                checked>
                                            <label class="form-check-label"> Piloto</label>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="3" checked>
                                        <label class="form-check-label"> TANQ</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="4">
                                        <label class="form-check-label"> TANQ 2</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="5" checked>
                                        <label class="form-check-label"> Dron</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="6" checked>
                                        <label class="form-check-label"> Cliente</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="7"
                                            checked>
                                        <label class="form-check-label"> T. Aplic</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="8"
                                            checked>
                                        <label class="form-check-label"> Desc LTS</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="9"
                                            checked>
                                        <label class="form-check-label"> Zona</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="10"
                                            checked>
                                        <label class="form-check-label"> Tot Has</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="11"
                                            checked>
                                        <label class="form-check-label"> Hda</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="12">
                                        <label class="form-check-label"> Ste</label>
                                    </div>
                                    @if ($is_root)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input toggle-column" data-column="13"
                                                checked>
                                            <label class="form-check-label"> Tot Bat/Vls</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input toggle-column" data-column="14"
                                                checked>
                                            <label class="form-check-label"> Tot Hrs</label>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="15"
                                            checked>
                                        <label class="form-check-label"> Has/hrs</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="16"
                                            checked>
                                        <label class="form-check-label"> Has/bat</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input toggle-column" data-column="17"
                                            checked>
                                        <label class="form-check-label"> Fecha prog</label>
                                    </div>
                                </div>
                            </div>
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            {{-- Plantilla mensajes --}}
            @include('layouts.message')
        </div>

        <div class="row">
            <div class="col-12 col-md-5">
                <div class="form-group">
                    {{ Form::label('id_cliente', 'Cliente') }}
                    {{ Form::select('id_cliente', $clients, $operation->id_cliente, ['class' => 'form-control select2' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'id' => 'id_cliente', 'placeholder' => 'Seleccione cliente']) }}
                    {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-1">
                <div class="form-group btn-modal">
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                        data-target="#formCliente">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z"
                                fill="#FCFCFC" />
                            <path
                                d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z"
                                fill="#FCFCFC" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('pilot_id', 'Piloto') }}
                    {{ Form::select('pilot_id', $pilots, $operation->pilot_id, ['class' => 'form-control select2' . ($errors->has('pilot_id') ? ' is-invalid' : ''), 'id' => 'pilot_id', 'placeholder' => 'Seleccione piloto']) }}
                    {!! $errors->first('pilot_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="form-group">
                    {{ Form::label('assistant_id_one', 'Tanqueador uno') }}
                    {{ Form::select('assistant_id_one', $assistents, $operation->assistant_id_one, ['class' => 'form-control select2' . ($errors->has('assistant_id_one') ? ' is-invalid' : ''), 'id' => 'assistant_id_one', 'placeholder' => 'Seleccione Tanqueador uno']) }}
                    {!! $errors->first('assistant_id_one', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-1">
                <div class="form-group btn-modal">
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                        data-target="#formAsistent">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z"
                                fill="#FCFCFC" />
                            <path
                                d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z"
                                fill="#FCFCFC" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="form-group">
                    {{ Form::label('assistant_id_two', 'Tanqueador dos') }}
                    {{ Form::select('assistant_id_two', $assistents, $operation->assistant_id_two, ['class' => 'form-control select2' . ($errors->has('assistant_id_two') ? ' is-invalid' : ''), 'id' => 'assistant_id_two', 'placeholder' => 'Seleccione Tanqueador dos']) }}
                    {!! $errors->first('assistant_id_two', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-1">
                <div class="form-group btn-modal">
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal"
                        data-target="#formAsistent">
                        <svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 4C8.225 4 3.5 8.725 3.5 14.5C3.5 20.275 8.225 25 14 25C19.775 25 24.5 20.275 24.5 14.5C24.5 8.725 19.775 4 14 4ZM14 22.8125C9.45 22.8125 5.6875 19.05 5.6875 14.5C5.6875 9.95 9.45 6.1875 14 6.1875C18.55 6.1875 22.3125 9.95 22.3125 14.5C22.3125 19.05 18.55 22.8125 14 22.8125Z"
                                fill="#FCFCFC" />
                            <path
                                d="M19.0746 13.3626H15.1371V9.4251C15.1371 8.8126 14.6121 8.2876 13.9996 8.2876C13.3871 8.2876 12.8621 8.8126 12.8621 9.4251V13.3626H8.92461C8.31211 13.3626 7.78711 13.8876 7.78711 14.5001C7.78711 15.1126 8.31211 15.6376 8.92461 15.6376H12.8621V19.5751C12.8621 20.1876 13.3871 20.7126 13.9996 20.7126C14.6121 20.7126 15.1371 20.1876 15.1371 19.5751V15.6376H19.0746C19.6871 15.6376 20.2121 15.1126 20.2121 14.5001C20.2121 13.8876 19.6871 13.3626 19.0746 13.3626Z"
                                fill="#FCFCFC" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('type_product', 'Tipo aplicación') }}
                    {{ Form::select('type_product', $type_products, $operation->type_product_id, ['class' => 'form-control select2' . ($errors->has('type_product_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una opcion']) }}
                    {!! $errors->first('type_product_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('date_operation', 'Fecha operacion') }}
                    {{ Form::date('date_operation', $operation->date_operation, ['class' => 'form-control' . ($errors->has('date_operation') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
                    {!! $errors->first('date_operation', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        {{-- INICIO DE ESPACIO PARA IMAGEN --}}
        @if ($operation->id != null)
            <div class="col-12 col-md-12 section-evidence">
                <div class="form-group">
                    {{ Form::label('file_evidence', 'Subir Evidencia (zip)') }}
                    <section id="multi-selector-uniq">
                        <input class="form-control" id="file_evidence" name="file_evidence" type="file" accept=".zip,.rar,.7zip">
                        @if (!empty($operation->file_evidence) || !is_null($operation->file_evidence))
                            <ul id="preview-files">
                                <li draggable="true" class="section-evidence-preview-zip">
                                    <p>Ya ha subido un archivo zip.</p>
                                </li>
                            </ul>
                        @endif                    
                    </section>
                </div>
            </div><br>
            <div class="col-12 col-md-12 section-evidence">
                <div class="form-group">
                    {{ Form::label('evidence_pdf', 'Subir Evidencia (PDF)') }}
                    <section id="multi-selector-uniq">
                        <input class="form-control" id="evidence_pdf" name="evidence_pdf" type="file" accept="application/pdf">
                        @if (!empty($operation->evidence_pdf) || !is_null($operation->evidence_pdf))
                            <ul id="preview-files">
                                <li draggable="true" class="section-evidence-preview-zip">
                                    <p>Ya ha subido un archivo (PDF).</p>
                                </li>
                            </ul>
                        @endif                    
                    </section>
                </div>
            </div>
        @endif        
        {{-- FIN DE ESPACIO PARA IMAGEN --}}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('observation_admin', 'Observaciones para piloto') }}
                    {{ Form::textArea('observation_admin', $operation->observation?->observation_admin, ['class' => 'form-control' . ($errors->has('observation_admin') ? ' is-invalid' : ''), 'rows' => '2', 'placeholder' => 'Observaciones']) }}
                    {!! $errors->first('observation_admin', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('observation_asistent_one', 'Observaciones para tanqueadores') }}
                    {{ Form::textArea('observation_asistent_one', $operation->observation?->observation_asistent_one, ['class' => 'form-control' . ($errors->has('observation_asistent_one') ? ' is-invalid' : ''), 'rows' => '2', 'placeholder' => 'Observaciones']) }}
                    {!! $errors->first('observation_asistent_one', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    @include('layouts.btn-submit')
</div>
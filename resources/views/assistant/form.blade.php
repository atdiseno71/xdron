<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('name', 'Nombre') }}
                    {{ Form::text('name', $assistant->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('lastname', 'Apellido') }}
                    {{ Form::text('lastname', $assistant->lastname, ['class' => 'form-control' . ($errors->has('lastname') ? ' is-invalid' : ''), 'placeholder' => 'Lastname']) }}
                    {!! $errors->first('lastname', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('type_document', 'Tipo de documento') }}
                    {{ Form::select('type_document', $type_documents, $assistant->type_document, ['class' => 'form-control select2' . ($errors->has('type_document') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un tipo de documento']) }}
                    {!! $errors->first('type_document', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('document_number') }}
                    {{ Form::number('document_number', $assistant->document_number, ['class' => 'form-control' . ($errors->has('document_number') ? ' is-invalid' : ''), 'placeholder' => 'Document Number']) }}
                    {!! $errors->first('document_number', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

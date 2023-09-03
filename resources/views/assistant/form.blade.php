<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="type_document">Tipo de documento</label>
                    <select name="type_document" id="type_document" class="form-control select2">
                        <option value="{{ $assistant->type_document }}" disabled selected>{{ $assistant->typeDocument->name ?? 'Seleccione un tipo de documento' }}</option>
                        @foreach ($type_documents as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('type_document', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('document_number', '# Documento') }}
                    {{ Form::number('document_number', $assistant->document_number, ['class' => 'form-control' . ($errors->has('document_number') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese número de documento']) }}
                    {!! $errors->first('document_number', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('name', 'Nombre') }}
                    {{ Form::text('name', $assistant->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingresar nombre']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('lastname', 'Apellido') }}
                    {{ Form::text('lastname', $assistant->lastname, ['class' => 'form-control' . ($errors->has('lastname') ? ' is-invalid' : ''), 'placeholder' => 'Ingresar apellido']) }}
                    {!! $errors->first('lastname', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

    </div>
    @include('layouts.btn-submit')
</div>

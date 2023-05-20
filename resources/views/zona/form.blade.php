<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_finca', 'Fincas') }}
                    {{ Form::select('id_finca', $fincas, $zona->id_finca, ['class' => 'form-control select2' . ($errors->has('id_finca') ? ' is-invalid' : ''), 'placeholder' => __('Select the category')]) }}
                    {!! $errors->first('id_finca', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('name', $zona->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre zona']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>


        {{-- <div class="form-group">
            {{ Form::label('id_finca') }}
            {{ Form::text('id_finca', $zona->id_finca, ['class' => 'form-control' . ($errors->has('id_finca') ? ' is-invalid' : ''), 'placeholder' => 'Id Finca']) }}
            {!! $errors->first('id_finca', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    @include('layouts.btn-submit')
</div>

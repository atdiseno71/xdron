<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_cliente') }}
            {{ Form::text('id_cliente', $aeronave->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Id Cliente']) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('matricula') }}
            {{ Form::text('matricula', $aeronave->matricula, ['class' => 'form-control' . ($errors->has('matricula') ? ' is-invalid' : ''), 'placeholder' => 'Matricula']) }}
            {!! $errors->first('matricula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('poliza_inicio') }}
            {{ Form::text('poliza_inicio', $aeronave->poliza_inicio, ['class' => 'form-control' . ($errors->has('poliza_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Poliza Inicio']) }}
            {!! $errors->first('poliza_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('poliza_fin') }}
            {{ Form::text('poliza_fin', $aeronave->poliza_fin, ['class' => 'form-control' . ($errors->has('poliza_fin') ? ' is-invalid' : ''), 'placeholder' => 'Poliza Fin']) }}
            {!! $errors->first('poliza_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cert_matricula_inicio') }}
            {{ Form::text('cert_matricula_inicio', $aeronave->cert_matricula_inicio, ['class' => 'form-control' . ($errors->has('cert_matricula_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Cert Matricula Inicio']) }}
            {!! $errors->first('cert_matricula_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cert_matricula_fin') }}
            {{ Form::text('cert_matricula_fin', $aeronave->cert_matricula_fin, ['class' => 'form-control' . ($errors->has('cert_matricula_fin') ? ' is-invalid' : ''), 'placeholder' => 'Cert Matricula Fin']) }}
            {!! $errors->first('cert_matricula_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cert_aereonavegabilidad_inicio') }}
            {{ Form::text('cert_aereonavegabilidad_inicio', $aeronave->cert_aereonavegabilidad_inicio, ['class' => 'form-control' . ($errors->has('cert_aereonavegabilidad_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Cert Aereonavegabilidad Inicio']) }}
            {!! $errors->first('cert_aereonavegabilidad_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cert_aereonavegabilidad_fin') }}
            {{ Form::text('cert_aereonavegabilidad_fin', $aeronave->cert_aereonavegabilidad_fin, ['class' => 'form-control' . ($errors->has('cert_aereonavegabilidad_fin') ? ' is-invalid' : ''), 'placeholder' => 'Cert Aereonavegabilidad Fin']) }}
            {!! $errors->first('cert_aereonavegabilidad_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('antinarcoticos_inicio') }}
            {{ Form::text('antinarcoticos_inicio', $aeronave->antinarcoticos_inicio, ['class' => 'form-control' . ($errors->has('antinarcoticos_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Antinarcoticos Inicio']) }}
            {!! $errors->first('antinarcoticos_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('antinarcoticos_fin') }}
            {{ Form::text('antinarcoticos_fin', $aeronave->antinarcoticos_fin, ['class' => 'form-control' . ($errors->has('antinarcoticos_fin') ? ' is-invalid' : ''), 'placeholder' => 'Antinarcoticos Fin']) }}
            {!! $errors->first('antinarcoticos_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_aereonave') }}
            {{ Form::text('archivo_aereonave', $aeronave->archivo_aereonave, ['class' => 'form-control' . ($errors->has('archivo_aereonave') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Aereonave']) }}
            {!! $errors->first('archivo_aereonave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('login') }}
            {{ Form::text('login', $aeronave->login, ['class' => 'form-control' . ($errors->has('login') ? ' is-invalid' : ''), 'placeholder' => 'Login']) }}
            {!! $errors->first('login', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechasys') }}
            {{ Form::text('fechasys', $aeronave->fechasys, ['class' => 'form-control' . ($errors->has('fechasys') ? ' is-invalid' : ''), 'placeholder' => 'Fechasys']) }}
            {!! $errors->first('fechasys', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_poliza') }}
            {{ Form::text('archivo_poliza', $aeronave->archivo_poliza, ['class' => 'form-control' . ($errors->has('archivo_poliza') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Poliza']) }}
            {!! $errors->first('archivo_poliza', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_cert_matricula') }}
            {{ Form::text('archivo_cert_matricula', $aeronave->archivo_cert_matricula, ['class' => 'form-control' . ($errors->has('archivo_cert_matricula') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Cert Matricula']) }}
            {!! $errors->first('archivo_cert_matricula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_avion') }}
            {{ Form::text('archivo_avion', $aeronave->archivo_avion, ['class' => 'form-control' . ($errors->has('archivo_avion') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Avion']) }}
            {!! $errors->first('archivo_avion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_cert_aereonavegabilidad') }}
            {{ Form::text('archivo_cert_aereonavegabilidad', $aeronave->archivo_cert_aereonavegabilidad, ['class' => 'form-control' . ($errors->has('archivo_cert_aereonavegabilidad') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Cert Aereonavegabilidad']) }}
            {!! $errors->first('archivo_cert_aereonavegabilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_antinarcoticos') }}
            {{ Form::text('archivo_antinarcoticos', $aeronave->archivo_antinarcoticos, ['class' => 'form-control' . ($errors->has('archivo_antinarcoticos') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Antinarcoticos']) }}
            {!! $errors->first('archivo_antinarcoticos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccional_estupefacientes_inicio') }}
            {{ Form::text('direccional_estupefacientes_inicio', $aeronave->direccional_estupefacientes_inicio, ['class' => 'form-control' . ($errors->has('direccional_estupefacientes_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Direccional Estupefacientes Inicio']) }}
            {!! $errors->first('direccional_estupefacientes_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccional_estupefacientes_fin') }}
            {{ Form::text('direccional_estupefacientes_fin', $aeronave->direccional_estupefacientes_fin, ['class' => 'form-control' . ($errors->has('direccional_estupefacientes_fin') ? ' is-invalid' : ''), 'placeholder' => 'Direccional Estupefacientes Fin']) }}
            {!! $errors->first('direccional_estupefacientes_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('archivo_direccional') }}
            {{ Form::text('archivo_direccional', $aeronave->archivo_direccional, ['class' => 'form-control' . ($errors->has('archivo_direccional') ? ' is-invalid' : ''), 'placeholder' => 'Archivo Direccional']) }}
            {!! $errors->first('archivo_direccional', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
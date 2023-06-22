<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdPostulacion') }}
            {{ Form::text('IdPostulacion', $postulacion->IdPostulacion, ['class' => 'form-control' . ($errors->has('IdPostulacion') ? ' is-invalid' : ''), 'placeholder' => 'Idpostulacion']) }}
            {!! $errors->first('IdPostulacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FechaPostulacion') }}
            {{ Form::text('FechaPostulacion', $postulacion->FechaPostulacion, ['class' => 'form-control' . ($errors->has('FechaPostulacion') ? ' is-invalid' : ''), 'placeholder' => 'Fechapostulacion']) }}
            {!! $errors->first('FechaPostulacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DescripOferta') }}
            {{ Form::text('DescripOferta', $postulacion->DescripOferta, ['class' => 'form-control' . ($errors->has('DescripOferta') ? ' is-invalid' : ''), 'placeholder' => 'Descripoferta']) }}
            {!! $errors->first('DescripOferta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('PerfilPostulacion') }}
            {{ Form::text('PerfilPostulacion', $postulacion->PerfilPostulacion, ['class' => 'form-control' . ($errors->has('PerfilPostulacion') ? ' is-invalid' : ''), 'placeholder' => 'Perfilpostulacion']) }}
            {!! $errors->first('PerfilPostulacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdDetallesOferta') }}
            {{ Form::text('IdDetallesOferta', $postulacion->IdDetallesOferta, ['class' => 'form-control' . ($errors->has('IdDetallesOferta') ? ' is-invalid' : ''), 'placeholder' => 'Iddetallesoferta']) }}
            {!! $errors->first('IdDetallesOferta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdEmpleado') }}
            {{ Form::text('IdEmpleado', $postulacion->IdEmpleado, ['class' => 'form-control' . ($errors->has('IdEmpleado') ? ' is-invalid' : ''), 'placeholder' => 'Idempleado']) }}
            {!! $errors->first('IdEmpleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdEstadoPostulaciones') }}
            {{ Form::text('IdEstadoPostulaciones', $postulacion->IdEstadoPostulaciones, ['class' => 'form-control' . ($errors->has('IdEstadoPostulaciones') ? ' is-invalid' : ''), 'placeholder' => 'Idestadopostulaciones']) }}
            {!! $errors->first('IdEstadoPostulaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
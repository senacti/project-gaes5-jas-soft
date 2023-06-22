<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdSugerencias') }}
            {{ Form::text('IdSugerencias', $buzonsugerencia->IdSugerencias, ['class' => 'form-control' . ($errors->has('IdSugerencias') ? ' is-invalid' : ''), 'placeholder' => 'Idsugerencias']) }}
            {!! $errors->first('IdSugerencias', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CategoriaSugerencia') }}
            {{ Form::text('CategoriaSugerencia', $buzonsugerencia->CategoriaSugerencia, ['class' => 'form-control' . ($errors->has('CategoriaSugerencia') ? ' is-invalid' : ''), 'placeholder' => 'Categoriasugerencia']) }}
            {!! $errors->first('CategoriaSugerencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DescripSugerencias') }}
            {{ Form::text('DescripSugerencias', $buzonsugerencia->DescripSugerencias, ['class' => 'form-control' . ($errors->has('DescripSugerencias') ? ' is-invalid' : ''), 'placeholder' => 'Descripsugerencias']) }}
            {!! $errors->first('DescripSugerencias', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdEmpleado') }}
            {{ Form::text('IdEmpleado', $buzonsugerencia->IdEmpleado, ['class' => 'form-control' . ($errors->has('IdEmpleado') ? ' is-invalid' : ''), 'placeholder' => 'Idempleado']) }}
            {!! $errors->first('IdEmpleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
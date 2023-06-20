<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdProducto') }}
            {{ Form::text('IdProducto', $producto->IdProducto, ['class' => 'form-control' . ($errors->has('IdProducto') ? ' is-invalid' : ''), 'placeholder' => 'Idproducto']) }}
            {!! $errors->first('IdProducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CantidadProducto') }}
            {{ Form::text('CantidadProducto', $producto->CantidadProducto, ['class' => 'form-control' . ($errors->has('CantidadProducto') ? ' is-invalid' : ''), 'placeholder' => 'Cantidadproducto']) }}
            {!! $errors->first('CantidadProducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ValorUnidadMedidaProducto') }}
            {{ Form::text('ValorUnidadMedidaProducto', $producto->ValorUnidadMedidaProducto, ['class' => 'form-control' . ($errors->has('ValorUnidadMedidaProducto') ? ' is-invalid' : ''), 'placeholder' => 'Valorunidadmedidaproducto']) }}
            {!! $errors->first('ValorUnidadMedidaProducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FechaFabricacion') }}
            {{ Form::text('FechaFabricacion', $producto->FechaFabricacion, ['class' => 'form-control' . ($errors->has('FechaFabricacion') ? ' is-invalid' : ''), 'placeholder' => 'Fechafabricacion']) }}
            {!! $errors->first('FechaFabricacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdColor') }}
            {{ Form::text('IdColor', $producto->IdColor, ['class' => 'form-control' . ($errors->has('IdColor') ? ' is-invalid' : ''), 'placeholder' => 'Idcolor']) }}
            {!! $errors->first('IdColor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdEmpleado') }}
            {{ Form::text('IdEmpleado', $producto->IdEmpleado, ['class' => 'form-control' . ($errors->has('IdEmpleado') ? ' is-invalid' : ''), 'placeholder' => 'Idempleado']) }}
            {!! $errors->first('IdEmpleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdUnidadMedida') }}
            {{ Form::text('IdUnidadMedida', $producto->IdUnidadMedida, ['class' => 'form-control' . ($errors->has('IdUnidadMedida') ? ' is-invalid' : ''), 'placeholder' => 'Idunidadmedida']) }}
            {!! $errors->first('IdUnidadMedida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdEstadoProducto') }}
            {{ Form::text('IdEstadoProducto', $producto->IdEstadoProducto, ['class' => 'form-control' . ($errors->has('IdEstadoProducto') ? ' is-invalid' : ''), 'placeholder' => 'Idestadoproducto']) }}
            {!! $errors->first('IdEstadoProducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdNombreProducto') }}
            {{ Form::text('IdNombreProducto', $producto->IdNombreProducto, ['class' => 'form-control' . ($errors->has('IdNombreProducto') ? ' is-invalid' : ''), 'placeholder' => 'Idnombreproducto']) }}
            {!! $errors->first('IdNombreProducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
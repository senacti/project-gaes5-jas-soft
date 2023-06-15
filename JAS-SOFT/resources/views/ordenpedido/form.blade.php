<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdOrdenPedido') }}
            {{ Form::text('IdOrdenPedido', $ordenpedido->IdOrdenPedido, ['class' => 'form-control' . ($errors->has('IdOrdenPedido') ? ' is-invalid' : ''), 'placeholder' => 'Idordenpedido']) }}
            {!! $errors->first('IdOrdenPedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidadProducto') }}
            {{ Form::text('cantidadProducto', $ordenpedido->cantidadProducto, ['class' => 'form-control' . ($errors->has('cantidadProducto') ? ' is-invalid' : ''), 'placeholder' => 'Cantidadproducto']) }}
            {!! $errors->first('cantidadProducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaPedido') }}
            {{ Form::text('fechaPedido', $ordenpedido->fechaPedido, ['class' => 'form-control' . ($errors->has('fechaPedido') ? ' is-invalid' : ''), 'placeholder' => 'Fechapedido']) }}
            {!! $errors->first('fechaPedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdProducto') }}
            {{ Form::text('IdProducto', $ordenpedido->IdProducto, ['class' => 'form-control' . ($errors->has('IdProducto') ? ' is-invalid' : ''), 'placeholder' => 'Idproducto']) }}
            {!! $errors->first('IdProducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdEstadopedido') }}
            {{ Form::text('IdEstadopedido', $ordenpedido->IdEstadopedido, ['class' => 'form-control' . ($errors->has('IdEstadopedido') ? ' is-invalid' : ''), 'placeholder' => 'Idestadopedido']) }}
            {!! $errors->first('IdEstadopedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
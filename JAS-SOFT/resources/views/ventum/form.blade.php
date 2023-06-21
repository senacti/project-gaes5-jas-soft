<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdVenta') }}
            {{ Form::text('IdVenta', $ventum->IdVenta, ['class' => 'form-control' . ($errors->has('IdVenta') ? ' is-invalid' : ''), 'placeholder' => 'Idventa']) }}
            {!! $errors->first('IdVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $ventum->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('totalVenta') }}
            {{ Form::text('totalVenta', $ventum->totalVenta, ['class' => 'form-control' . ($errors->has('totalVenta') ? ' is-invalid' : ''), 'placeholder' => 'Totalventa']) }}
            {!! $errors->first('totalVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('subTotal') }}
            {{ Form::text('subTotal', $ventum->subTotal, ['class' => 'form-control' . ($errors->has('subTotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal']) }}
            {!! $errors->first('subTotal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CantidadDescuento') }}
            {{ Form::text('CantidadDescuento', $ventum->CantidadDescuento, ['class' => 'form-control' . ($errors->has('CantidadDescuento') ? ' is-invalid' : ''), 'placeholder' => 'Cantidaddescuento']) }}
            {!! $errors->first('CantidadDescuento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('totalIva') }}
            {{ Form::text('totalIva', $ventum->totalIva, ['class' => 'form-control' . ($errors->has('totalIva') ? ' is-invalid' : ''), 'placeholder' => 'Totaliva']) }}
            {!! $errors->first('totalIva', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdCliente') }}
            {{ Form::text('IdCliente', $ventum->IdCliente, ['class' => 'form-control' . ($errors->has('IdCliente') ? ' is-invalid' : ''), 'placeholder' => 'Idcliente']) }}
            {!! $errors->first('IdCliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdPagos') }}
            {{ Form::text('IdPagos', $ventum->IdPagos, ['class' => 'form-control' . ($errors->has('IdPagos') ? ' is-invalid' : ''), 'placeholder' => 'Idpagos']) }}
            {!! $errors->first('IdPagos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdEmpleado') }}
            {{ Form::text('IdEmpleado', $ventum->IdEmpleado, ['class' => 'form-control' . ($errors->has('IdEmpleado') ? ' is-invalid' : ''), 'placeholder' => 'Idempleado']) }}
            {!! $errors->first('IdEmpleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('IdOrdenPedido') }}
            {{ Form::text('IdOrdenPedido', $ventum->IdOrdenPedido, ['class' => 'form-control' . ($errors->has('IdOrdenPedido') ? ' is-invalid' : ''), 'placeholder' => 'Idordenpedido']) }}
            {!! $errors->first('IdOrdenPedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
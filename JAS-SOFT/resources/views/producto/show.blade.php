@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? "{{ __('Show') Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idproducto:</strong>
                            {{ $producto->IdProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidadproducto:</strong>
                            {{ $producto->CantidadProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Valorunidadmedidaproducto:</strong>
                            {{ $producto->ValorUnidadMedidaProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Fechafabricacion:</strong>
                            {{ $producto->FechaFabricacion }}
                        </div>
                        <div class="form-group">
                            <strong>Idcolor:</strong>
                            {{ $producto->IdColor }}
                        </div>
                        <div class="form-group">
                            <strong>Idempleado:</strong>
                            {{ $producto->IdEmpleado }}
                        </div>
                        <div class="form-group">
                            <strong>Idunidadmedida:</strong>
                            {{ $producto->IdUnidadMedida }}
                        </div>
                        <div class="form-group">
                            <strong>Idestadoproducto:</strong>
                            {{ $producto->IdEstadoProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Idnombreproducto:</strong>
                            {{ $producto->IdNombreProducto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $ordenpedido->name ?? "{{ __('Show') Ordenpedido" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ordenpedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ordenpedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idordenpedido:</strong>
                            {{ $ordenpedido->IdOrdenPedido }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidadproducto:</strong>
                            {{ $ordenpedido->cantidadProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Fechapedido:</strong>
                            {{ $ordenpedido->fechaPedido }}
                        </div>
                        <div class="form-group">
                            <strong>Idproducto:</strong>
                            {{ $ordenpedido->IdProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Idestadopedido:</strong>
                            {{ $ordenpedido->IdEstadopedido }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

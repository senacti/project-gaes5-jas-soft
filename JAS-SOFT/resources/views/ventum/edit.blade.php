@extends('layouts.app')

@section('template_title')
    {{ __('Edit Ventum') }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Ventum') }}</div>
                    <div class="card-body">
                        <form action="{{ route('ventum.edit') }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="totalVenta"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Total Venta') }}</label>
                                <div class="col-md-6">
                                    <input id="totalVenta" type="text" class="form-control" name="totalVenta"
                                        value="{{ $venta->totalVenta }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subTotal"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Subtotal') }}</label>
                                <div class="col-md-6">
                                    <input id="subTotal" type="text" class="form-control" name="subTotal"
                                        value="{{ $venta->subTotal }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="CantidadDescuento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cantidad Descuento') }}</label>
                                <div class="col-md-6">
                                    <input id="CantidadDescuento" type="text" class="form-control"
                                        name="CantidadDescuento" value="{{ $venta->CantidadDescuento }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="totalIva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Total IVA') }}</label>
                                <div class="col-md-6">
                                    <input id="totalIva" type="text" class="form-control" name="totalIva"
                                        value="{{ $venta->totalIva }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

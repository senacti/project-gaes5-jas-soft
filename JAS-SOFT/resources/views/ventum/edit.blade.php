<link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="{{ asset('css/Style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilos-dash-admin.css') }}"> 

<form action="{{ route('ventum.actualizarventum') }}" method="post">  
    @csrf            
    <div class="modal-body">
        <div class="row">
            <div class="form-floating mb-3 mt-3">
                <input type="hidden" class="form-control" id="idventa" placeholder="Id Venta" name="idventa" required value="{{ $ventas->IdVenta }}">       
            </div>

            <div class="form-floating mt-3 mb-3 col-6">
                <input type="text" class="form-control" id="totalventa" placeholder="Total" name="totalventa" required value="{{ $ventas->totalVenta }}">
                <label for="Total">Total</label>
            </div> 

            <div class="form-floating mt-3 mb-3 col-6">
                <input type="text" class="form-control" id="subTotal" placeholder="Subtotal" name="subTotal" required value="{{ $ventas->subTotal }}">
                <label for="Subtotal">Subtotal</label>
            </div> 

            <div class="form-floating mt-3 mb-3 col-6">
                <input type="text" class="form-control" id="descuento" placeholder="Descuento" name="descuento" required value="{{ $ventas->cantidadDescuento }}">
                <label for="Descuento">Descuento</label>
            </div> 

            <div class="form-floating mt-3 mb-3 col-6">
                <input type="text" class="form-control" id="totaliva" placeholder="IVA" name="totaliva" required value="{{ $ventas->totalIva }}">
                <label for="IVA">IVA</label>
            </div> 
        </div>
        <button type="submit">Guardar</button>
    </div>
</form>

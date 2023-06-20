<link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilos-dash-admin.css') }}">



<form action="{{ route('ordenpedido.actualizarordenpedido') }}" class="was-validated" method="post">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="form-floating mb-3 mt-3 col-4">
                <input type="text" class="form-control" id="cantidadProducto"
                    placeholder="cantidadProducto" name="cantidadProducto" maxlength="30" required value="{{$ordenpedidos->cantidadProducto}}">
                <label for="cantidad">Cantidad</label>
            </div>             
            <div class="form-floating mt-4 mb-3 col-6">
                <select class="form-select" id="IdEstadopedido" name="IdEstadopedido" value="{{$ordenpedidos->IdEstadopedido}}">
                    <option value="1">En produccion</option>
                    <option value="2">En espera</option>
                    <option value="2">En alistamiento</option>
                </select>
                <label for="Estadopedido" class="form-label">Estado</label>
            </div>
            <button type="submit">Guardar</button>
        </div>
</form>

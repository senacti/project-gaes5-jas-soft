<link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilos-dash-admin.css') }}">



<form action="{{ route('ordenpedido.actualizarordenpedido')}}" method="post">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div>
                <input type="hidden" class="form-control" id="idordenpedido" placeholder="idproducto" name="idordenpedido" required value="{{$ordenpedidos->IdOrdenPedido}}">
            </div>
            <div class="form-floating mb-3 mt-3 col-4">
                <input type="text" class="form-control" id="cantidadProducto"
                    placeholder="cantidadProducto" name="cantidadproducto" maxlength="30" required value="{{$ordenpedidos->cantidadProducto}}" >
                <label for="cantidad">Cantidad</label>
            </div>             
            <div class="form-floating mt-4 mb-3 col-6">
                <select class="form-select" id="idestadopedido" name="idestadopedido" value="{{$ordenpedidos->IdEstadopedido}}">
                    <option value="1">En produccion</option>
                    <option value="2">En espera</option>
                    <option value="2">En alistamiento</option>
                </select>
                <label for="idestadopedido" class="form-label">Estado</label>
            </div>
            <button type="submit">Guardar</button>
        </div>
</form>

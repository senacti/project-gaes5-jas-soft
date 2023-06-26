<link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="{{ asset('css/Style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilos-dash-admin.css') }}">
<link rel="stylesheet" href="{{ asset ('css/vistaEditar.css') }}">

<header class="dash-menu">
        <img class="logo-dash-admin" src="../../../PICTURES/logo.png" alt="logo">
        <a class="nav-link" href="{{ url('/index') }}">Insumo</a>
        <ul class="list-menu-ul">
            <li class="list-menu-dash"> <img class="img-menu-dash" src="../../../pictures/campana.png" alt="Campana"> </li>
            <li class="list-menu-dash"> Administrador (Administrador) </li>
            <li class="list-menu-dash"> <img class="img-menu-dash rotate-img" src="../../../PICTURES/flecha.png" alt="flecha">
            </li>
            <li class="list-menu-dash"> <img class="img-menu-dash-users" src="../../../PICTURES/usuario.png" alt="">
            </li>
        </ul>
</header>

<div class="box-content">
    <form action="{{ route('ventum.actualizarventum') }}" method="post">  
        @csrf            
        <div class="modal-body">
            <div class="row">
                <div class="form-group">
                    <div class="form-floating mb-1 mt-3 col-8">
                        <input type="hidden" class="form-control" id="idventa" placeholder="Id Venta" name="idventa" required value="{{ $ventas->IdVenta }}">       
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="form-floating mt-1 mb-3 col-8">
                        <input type="text" class="form-control" id="totalventa" placeholder="Total" name="totalventa" required value="{{ $ventas->totalVenta }}">
                        <label for="Total">Total</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="form-floating mt-1 mb-3 col-8">
                        <input type="text" class="form-control" id="subTotal" placeholder="Subtotal" name="subTotal" required value="{{ $ventas->subTotal }}">
                        <label for="Subtotal">Subtotal</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="form-floating mt-1 mb-3 col-8">
                        <input type="text" class="form-control" id="descuento" placeholder="Descuento" name="descuento" required value="{{ $ventas->cantidadDescuento }}">
                        <label for="Descuento">Descuento</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="form-floating mt-1 mb-3 col-8">
                        <input type="text" class="form-control" id="totaliva" placeholder="IVA" name="totaliva" required value="{{ $ventas->totalIva }}">
                        <label for="IVA">IVA</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-md-6 offset-md-1 btn-guardar"> 
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilos-dash-admin.css') }}">
<link rel="stylesheet" href="{{ asset ('css/vistaEditar.css') }}"> 

<header class="dash-menu">
    <img class="logo-dash-admin" src="../../../PICTURES/logo.png" alt="logo">
    <a class="nav-link" href="{{ url('/index') }}">Producción</a>
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
    <form action="{{ route('ordenpedido.actualizarordenpedido')}}" method="post">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="form-group"> 
                <div>
                    <input type="hidden" class="form-control" id="idordenpedido" placeholder="idproducto" name="idordenpedido" required value="{{$ordenpedidos->IdOrdenPedido}}">
                </div>
                <div class="form-floating mb-3 mt-3 col-8">
                    <input type="text" class="form-control" id="cantidadProducto"
                        placeholder="cantidadProducto" name="cantidadproducto" maxlength="30" required value="{{$ordenpedidos->cantidadProducto}}" >
                    <label for="cantidad">Cantidad</label>
                </div>  
            </div>
        </div>   
        
        <div class="row">
            <div class="form-group">
                <div class="form-floating mt-3 mb-3 col-8">
                    <select class="form-select" id="idestadopedido" name="idestadopedido" value="{{$ordenpedidos->IdEstadopedido}}">
                        <option value="1">En produccion</option>
                        <option value="2">En espera</option>
                        <option value="2">En alistamiento</option>
                    </select>
                    <label for="idestadopedido" class="form-label">Estado</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-md-6 offset-md-2 btn-guardar"> 
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

    </div>
    </form>
</div>

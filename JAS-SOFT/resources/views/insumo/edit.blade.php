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
    <form action="{{ route('insumo.actualizarinsumo') }}" method="post">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="form-group">                        
                    <div class="form-floating mb-3 mt-3 col-8">
                        <input type="hidden" class="form-control" id="idinsumo" placeholder="Nombre Insumo" name="idinsumo"
                            required value="{{ $insumos->IdInsumo }}">
                    </div>
                </div>
            </div>  
            
            <div class="row">
                <div class="form-group">
                    <div class="form-floating mt-3 mb-3 col-8">
                        <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad"
                            name="Cantidad" maxlength="9" value="{{ $insumos->Cantidad }}">
                        <label for="Cantidad">Cantidad</label>
                    </div>
                </div>   
            </div> 

            <div class="row">
                <div class="form-group">  
                    {{-- <div class="form-floating mt-3 mb-3 col-8">
                        <select class="form-select" id="Unidadmedida" name="Unidadmedida" required value="{{$insumos->Unidadmedida}}">
                            <option value="1">Kg</option>
                            <option value="2">Gr</option>                              
                        </select>
                        <label for="sel1" class="form-label">Unidad</label>
                    </div> --}}
                </div>
            </div>

            <div class="row">
                <div class="form-group">  
                    <div class="form-floating mt-3 mb-3 col-8">
                        <select class="form-select" class="form-control" id="Color" placeholder="Color" name="Color"
                            required value="{{ $insumos->Color }}">
                            <option value="1">Rojo</option>
                            <option value="2">Verde</option>
                            <option value="3">Azul</option>
                            <option value="4">Amarillo</option>
                            <option value="4">Negro</option>
                        </select>
                        <label for="Color">Color</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    {{-- <div class="col-md-6 offset-md-2 btn-guardar">
                        <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño" required value="{{$insumos->Tamaño}}">
                        <label for="Tamaño">Tamaño</label>
                    </div> --}}
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

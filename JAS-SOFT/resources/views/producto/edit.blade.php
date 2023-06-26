<link href="{{ asset ('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="{{ asset ('css/Style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/Header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset ('css/estilos-dash-admin.css') }}"> 
<link rel="stylesheet" href="{{ asset ('css/vistaEditar.css') }}"> 

            <header class="dash-menu">
                <img class="logo-dash-admin" src="../../../PICTURES/logo.png" alt="logo">
                <a class="nav-link" href="{{ url('/index') }}">Inventario</a>
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
                <form action="{{ route('producto.actualizarproducto') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">                        
                                <div class="form-floating mt-3 mb-3 col-8">
                                    <input type="text" required class="form-control" id="cantidadproducto" placeholder="CantidadProducto" name="cantidadproducto" maxlength="10" value="{{$productos->CantidadProducto}}">
                                    <label for="cantidadproducto">Cantidad</label>
                                </div>
                            </div>    
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="form-floating mt-3 mb-3 col-8">
                                    <select class="form-select" id="idestadoproducto" placeholder="Estado" name="idestadoproducto" value="{{ $productos->IdEmpleado }}">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Stock</option>
                                        <option value="2">Transito</option>
                                        <option value="3">Vendido</option>
                                        <option value="4">Devuelto</option>
                                        <option value="5">Defectuoso</option>
                                    </select>
                                    <label for="idestadoproducto" class="form-label">Estado</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">                  
                                <div class="form-floating mt-3 mb-3 col-8">
                                    <select class="form-select" id="idcolor" placeholder="color" name="idcolor" required value="{{ $productos->IdColor }}">
                                        <option value="1">Rojo</option>
                                        <option value="2">Verde</option>
                                        <option value="3">Azul</option>
                                        <option value="4">Amarillo</option>
                                        <option value="4">Negro</option>
                                    </select>
                                    <label for="idcolor">Color</label>
                                </div>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 offset-md-2 btn-guardar">  
                                    <input type="hidden" name="idproducto" value="{{$productos->IdProducto}}">
                                    <button type="submit" class="btn btn-primary"> Guardar </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


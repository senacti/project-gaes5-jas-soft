<link href="{{ asset ('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="{{ asset ('css/Style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/Header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset ('css/estilos-dash-admin.css') }}"> 

            <!-- Modal body -->
            <form action="{{ route('producto.actualizarproducto') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">                        
                        <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" required class="form-control" id="cantidadproducto" placeholder="CantidadProducto" name="cantidadproducto" maxlength="10" value="{{$productos->CantidadProducto}}">
                            <label for="Cantidad">Cantidad</label>
                        </div>                      
                        <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="idcolor" placeholder="idcolors" name="idcolor"value="{{$productos->IdColor}}">
                            <label for="idcolors">Color</label>
                        </div>  
                    </div>
                    <button type="submit">Guardar</button>
                </div>
            </form>

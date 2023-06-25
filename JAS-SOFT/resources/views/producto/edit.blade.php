<link href="{{ asset ('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="{{ asset ('css/Style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/Header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset ('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset ('css/estilos-dash-admin.css') }}"> 

            
            <form action="{{ route('producto.actualizarproducto') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">                        
                        <div class="form-floating mt-3 mb-3 col-4">
                            <input type="text" required class="form-control" id="cantidadproducto" placeholder="CantidadProducto" name="cantidadproducto" maxlength="10" value="{{$productos->CantidadProducto}}">
                            <label for="cantidadproducto">Cantidad</label>
                        </div>    
                        <div class="form-floating mt-3 mb-3 col-4">
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
                        <div class="form-floating mt-3 mb-3 col-4">
                            <select class="form-select" id="idcolor" placeholder="color"
                                name="idcolor" required value="{{ $productos->IdColor }}">
                                <option value="1">Rojo</option>
                                <option value="2">Verde</option>
                                <option value="3">Azul</option>
                                <option value="4">Amarillo</option>
                                <option value="4">Negro</option>
                            </select>
                            <label for="idcolor">Color</label>
                        </div>                         
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">  

                            <input type="hidden" name="idproducto" value="{{$productos->IdProducto}}">

                            <button type="submit" class="btn btn-primary">
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>

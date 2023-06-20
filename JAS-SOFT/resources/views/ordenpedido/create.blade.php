<div class="modal" id="myModal">
    <div class="modal-dialog">
<<<<<<< Updated upstream
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar Produccion</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="validationForm" class="needs-validation" name="validationForm">
              <div class="row">
                <div class="form-floating mb-3 mt-3">
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre Insumo" name="Nombre Insumo"  maxlength="30" required  onkeypress="return soloLetras(event)"> 
                  <label for="Nombre Insumo">Nombre Insumo</label>                                                    
                </div>
                <div class="form-floating mt-3 mb-3 col-8">
                  <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" maxlength="20" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">      
                  <label for="Cantidad">Cantidad</label>
                </div> 

                <div class="form-floating mt-3 mb-3 col-4">
                  <select class="form-select" id="sel1" name="Unidadmedida">
                    <option>Kg</option>
                    <option>Gr</option>                              
                  </select>
                  <label for="sel1" class="form-label">Unidad</label>
                </div> 

                <div class="form-floating mt-3 mb-3 col-6">
                  <input type="text" class="form-control" id="color" placeholder="Color" name="Color" required onkeypress="return soloLetras(event)">
                  <label for="Color">Color</label>                            
                </div> 

                <div class="form-floating mt-3 mb-3 col-6">
                  <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño" required>
                  <label for="Tamaño">Tamaño</label>
                </div>
                <div class="form-floating mt-3 mb-3 col-7">
                  <td><input type="datetime-local"></td>
                </div>
                <div class="form-floating mt-3 mb-3 col-6">
                  <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" maxlength="#" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">                            
                  <label for="Cantidad">Codigo insumo</label>
                </div> 
                <div class="form-floating mt-3 mb-3 col-6">
                  <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad del insumo" name="Cantidadinsumo" maxlength="#" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">                            
                  <label for="Cantidad del insumo">Cantidad del insumo</label>
                </div> 
              </div>                        
            </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="verificar()">Guardar</button>
        </div>
      </div> 
    </div> 
  </div>
=======
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar Produccion</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('ordenpedido.almacenar') }}" class="was-validated" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-floating mb-3 mt-3 col-4">
                            <input type="text" class="form-control" id="cantidadProducto"
                                placeholder="cantidadProducto"name="cantidadProducto" maxlength="30" required>
                            <label for="cantidadProducto">Cantidad</label>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-7">
                            <input type="datetime-local" required class="form-control" id="fechaPedido"
                                placeholder="fechaPedido" name="fechaPedido" maxlength="20">
                            <label for="fechaPedido">fecha</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="IdProducto" name="IdProducto">
                                <option value="1">botellas de plasticos</option>
                                <option value="2">Ganchos plasticos</option>
                            </select>
                            <label for="IdProducto" class="form-label">Producto</label>
                        </div>
                        <div class="form-floating mt-4 mb-3 col-6">
                            <select class="form-select" id="IdEstadopedido" name="IdEstadopedido">
                                <option value="1">En produccion</option>
                                <option value="2">En espera</option>
                                <option value="2">En alistamiento</option>
                            </select>
                            <label for="IdEstadopedido" class="form-label">Estado</label>
                        </div>
                    </div>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" onclick="document.getElementById('submitordenpedido').click();return false;"
                       class="btn btn-primary">{{ __('guardar') }}</button>
        </div>
    </div>
</div>
</div>
>>>>>>> Stashed changes

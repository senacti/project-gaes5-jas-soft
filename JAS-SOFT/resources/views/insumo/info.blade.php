 <!-- The Modal -->
 <div class="modal" id="editar{{$insumo->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar Insumo</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
       
            <form action="{{ route('insumo.listar')}}" class="was-validated" method="POST">  
              @csrf                          
              @method ('PUT')
              <div class="modal-body">
              <div class="row">
                <div class="form-floating mb-3 mt-3">
                  <input type="text" class="form-control" id="NombreInsumo" placeholder="Nombre Insumo" name="NombreInsumo" required value="{{$insumos->NombreInsumo}}"> 
                  <label for="Nombre Insumo">Nombre Insumo</label>
                  <div class="valid-feedback"></div>
                  <div class="invalid-feedback">Porfavor complete el campo</div>
                </div>
                <div class="form-floating mt-3 mb-3 col-8">
                  <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="{{$insumo->Cantidad}}"> 
                  
                  <label for="Cantidad">Cantidad</label>
                </div> 

                <div class="form-floating mt-3 mb-3 col-4">
                  <select class="form-select" id="Unidadmedida" name="Unidadmedida" required value="{{$insumos->Unidadmedida}}">
                    <option value="1">Kg</option>
                    <option value="2">Gr</option>                              
                  </select>
                  <label for="sel1" class="form-label">Unidad</label>
                </div> 

                <div class="form-floating mt-3 mb-3 col-6">
                  <input type="text" class="form-control" id="Color" placeholder="Color" name="Color" required value="{{$insumo->Color}}">
                  <label for="Color">Color</label>
                </div> 

                <div class="form-floating mt-3 mb-3 col-6">
                  <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño" required value="{{$insumo->Tamaño}}">
                  <label for="Tamaño">Tamaño</label>
                </div>
              </div>
              <button type="submit" id="submitInsumo" class="hidden"></button>
            </div>
            </form>
        
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" onclick="document.getElementById('submitInsumo').click();return false;" class="btn btn-primary">{{ __('Submit') }}</button>
          
        </div>
      </div>
    </div>
  </div>   

  <!-- The Modal -->
  <div class="modal" id="ordenModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Orden de compra</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->       
        <div class="modal-body">
            <form action="{{route ('registerInsumo.update')}}" method="POST" class="was-validated">
              <div class="row">
                <div class="form-floating mb-3 mt-3">
                  <input type="text" class="form-control" id="Nombre Insumo" placeholder="Nombre Insumo" name="Nombre Insumo" required> 
                  <label for="Nombre Insumo">Nombre Insumo</label>
                  <div class="valid-feedback"></div>
                  <div class="invalid-feedback">Porfavor complete el campo</div>
                </div>
                <div class="form-floating mt-3 mb-3 col-8">
                  <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">                                
                  <label for="Cantidad">Cantidad</label>
                </div> 

                <div class="form-floating mt-3 mb-3 col-4">
                  <select class="form-select" id="sel1" name="Unidadmedida" required>
                    <option>Kg</option>
                    <option>Gr</option>                              
                  </select>
                  <label for="sel1" class="form-label">Unidad</label>
                </div> 

                <div class="form-floating mt-3 mb-3 col-6">
                  <input type="text" class="form-control" id="Color" placeholder="Color" name="Color" required>
                  <label for="Color">Color</label>
                </div> 

                <div class="form-floating mt-3 mb-3 col-6">
                  <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño" required>
                  <label for="Tamaño">Tamaño</label>
                </div>
                <div class="form-floating mt-3 mb-3 col-6">
                  <select class="form-select" id="sel1" name="Unidadmedida" required>
                    <option>Proveedor a</option>
                    <option>Proveedor b</option>                              
                  </select>
                  <label for="sel1" class="form-label">Proveedor</label>
                </div> 
              </div>
            </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
        </div>
  
      </div>
    </div>
  </div>
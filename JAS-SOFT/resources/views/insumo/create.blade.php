   <!-- The Modal -->
   <div class="modal" id="create">
       <div class="modal-dialog">
           <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                   <h4 class="modal-title">Registrar Insumo</h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>

               <!-- Modal body -->
               <form action="{{ route('registerInsumo.almacenar') }}" class="was-validated" method="POST">
                   @csrf
                   <div class="modal-body">
                       <div class="row">
                           <div class="form-floating mb-3 mt-3">
                               <input type="text" class="form-control" id="NombreInsumo" placeholder="Nombre Insumo"
                                   name="NombreInsumo" required value="{{ $insumo->NombreInsumo }}">
                               <label for="Nombre Insumo">Nombre Insumo</label>
                               <div class="valid-feedback"></div>
                               <div class="invalid-feedback">Porfavor complete el campo</div>
                           </div>
                           <div class="form-floating mt-3 mb-3 col-8">
                               <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad"
                                   name="Cantidad" maxlength="9"
                                   onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                   value="{{ $insumo->Cantidad }}">
                               <label for="Cantidad">Cantidad</label>
                           </div>

                           <div class="form-floating mt-3 mb-3 col-4">
                               <select class="form-select" id="Unidadmedida" name="Unidadmedida" required
                                   value="{{ $insumo->Unidadmedida }}">
                                   <option value="1">Kg</option>
                                   <option value="2">Gr</option>
                               </select>
                               <label for="sel1" class="form-label">Unidad</label>
                           </div>
                           <div class="form-floating mt-3 mb-3 col-6">
                               <input type="text" class="form-control" id="Color" placeholder="Color"
                                   name="Color" required value="{{ $insumo->Color }}">
                               <label for="Color">Color</label>
                           </div>
                           <div class="form-floating mt-3 mb-3 col-6">
                               <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño"
                                   name="Tamaño" required value="{{ $insumo->Tamaño }}">
                               <label for="Tamaño">Tamaño</label>
                           </div>
                       </div>
                       <button type="submit" id="submitInsumo" class="hidden"></button>
                   </div>
               </form>


               <!-- Modal footer -->
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                   <button type="button" onclick="document.getElementById('submitInsumo').click();return false;"
                       class="btn btn-primary">{{ __('guardar') }}</button>
               </div>
           </div>
       </div>
   </div>

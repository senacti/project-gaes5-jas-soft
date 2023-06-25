<!-- The Modal -->
<div class="modal" id="create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Registrar Insumo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('producto.almacenar') }}" class="was-validated" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="Nombreproducto" placeholder="Nombre Insumo"
                                name="Nombreproducto" required>
                            <label for="Nombreproducto">Nombre Producto</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Porfavor complete el campo</div>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" required class="form-control" id="cantidadproducto"
                                placeholder="cantidadproducto" name="cantidadproducto" maxlength="#"
                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            <label for="Cantidad">Cantidad</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="valorunidadmedidaproducto" name="valorunidadmedidaproducto">
                                <option value="0">Seleccione</option>
                                <option value="1">Kg</option>
                                <option value="2">Gr</option>
                                <option value="3">L</option>
                                <option value="4">Ms</option>
                                <option value="5">Cm</option>
                            </select>
                            <label for="valorunidadmedidaproducto" class="form-label">Unidad</label>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-4">
                            <select class="form-select" class="form-control" id="idcolor" placeholder="idcolor"
                                name="idcolor" required >
                                <option value="0">Seleccione</option>
                                <option value="1">Rojo</option>
                                <option value="2">Verde</option>
                                <option value="3">Azul</option>
                                <option value="4">Amarillo</option>
                                <option value="4">Negro</option>
                            </select>
                            <label for="color">Color</label>
                        </div> 
                        <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="idempleado" name="idempleado">
                                <option value="0">Seleccione</option>
                                <option value="1">juan</option>
                                <option value="2">Pedro</option>
                                <option value="3">Maria</option>
                                <option value="4">Cristian</option>
                                <option value="5">Samuel</option>
                            </select>
                            <label for="idempleado" class="form-label">Empleado</label>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="idestadoproducto" placeholder="Estado" name="idestadoproducto">
                                <option value="0">Seleccione</option>
                                <option value="1">Stock</option>
                                <option value="2">Transito</option>
                                <option value="3">Vendido</option>
                                <option value="4">Devuelto</option>
                                <option value="5">Defectuoso</option>
                            </select>
                            <label for="idestadoproducto" class="form-label">Estado</label>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="tamaño" placeholder="tamaño"
                                name="tamaño">
                            <label for="tamaño">Tamaño</label>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-9">
                            <input type="datetime-local" id="fechafabricacion" name="fechafabricacion">Fecha de fabricacion
                        </div>
                        <button type="submit" id="submitProducto" class="hidden"></button>
                    </div>
                </div>
            </form>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="document.getElementById('submitProducto').click();return false;"
                    class="btn btn-primary">{{ __('guardar') }}</button>
            </div>
        </div>
    </div>
</div>

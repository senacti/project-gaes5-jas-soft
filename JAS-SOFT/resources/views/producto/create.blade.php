 <!-- The Modal -->
 <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar producto</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" class="was-validated">
                    <div class="row">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="Nombre Producto"
                                placeholder="Nombre Insumo" name="Nombre Insumo" required>
                            <label for="Nombre Insumo">Nombre Producto</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Porfavor complete el campo</div>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-8">
                            <input type="text" required class="form-control"
                                id="Cantidad" placeholder="Cantidad" name="Cantidad"
                                maxlength="#"
                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            <label for="Cantidad">Cantidad</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-4">
                            <select class="form-select" id="sel1" name="Unidadmedida">
                                <option>Kg</option>
                                <option>Gr</option>
                                <option>L</option>
                                <option>Ms</option>
                                <option>Cm</option>
                            </select>
                            <label for="sel1" class="form-label">Unidad</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="Color"
                                placeholder="Color" name="Color">
                            <label for="Color">Ubicación</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="Tamaño"
                                placeholder="Tamaño" name="Tamaño">
                            <label for="Tamaño">Tamaño</label>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-9">
                            <input type="datetime-local">Fecha de fabricacion
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                    data-bs-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
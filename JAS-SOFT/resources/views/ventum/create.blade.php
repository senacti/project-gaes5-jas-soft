<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Crear venta</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('ventum.almacenar') }}" class="was-validated" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="Nombre Cliente" placeholder="Nombre Cliente"
                                name="Nombre Cliente" required>
                            <label for="Nombre Cliente">Nombre Cliente</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Porfavor complete el campo</div>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad"
                                name="Cantidad" maxlength="#"
                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">

                            <label for="Cantidad">Cantidad</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="sel1" name="Tipopago">
                                <option>Abono</option>
                                <option>Total</option>
                            </select>
                            <label for="sel1" class="form-label">Tipo de pago</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="sel1" name="Metodopago">
                                <option>Efectivo</option>
                                <option>Debito</option>
                                <option>Credito</option>
                                <option>PSE</option>
                            </select>
                            <label for="sel1" class="form-label">Metodo de pago</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="sel1" name="Produto">
                                <option>Jarras</option>
                                <option>Ganchos</option>
                                <option>Tapper</option>
                                <option>Papelera</option>
                            </select>
                            <label for="sel1" class="form-label">Metodo de pago</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="Color" placeholder="Color" name="Color"
                                required>
                            <label for="Color">Total</label>
                        </div>

                        <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño"
                                name="Tamaño" required>
                            <label for="Tamaño">Subtotal</label>
                        </div>
                        <div class="form-floating mt-3 mb-3 col-7">
                            <td><input type="datetime-local"></td>
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

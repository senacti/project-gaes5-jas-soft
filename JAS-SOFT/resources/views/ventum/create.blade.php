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
                        <input type="hidden" class="form-control" id="idventa" placeholder="Id Venta" name="idventa" required value="{{ $venta->IdVenta }}">

                        <div class="col-md-6">
                            <div class="form-floating mt-3 mb-3">
                                <input type="datetime-local" required class="form-control" id="fechaVenta" placeholder="fechaVenta" name="fechaVenta" maxlength="20">
                                <label for="fechaVenta">Fecha</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="totalVenta" placeholder="Total" name="totalVenta" required>
                                <label for="totalVenta">Total</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Complete el campo</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="subTotal" placeholder="subTotal" name="subTotal" required>
                                <label for="subTotal">Subtotal</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Complete el campo</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="descuento" placeholder="Descuento" name="descuento" required>
                                <label for="descuento">Descuento</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Complete el campo</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="totalIva" placeholder="IVA" name="totalIva" required>
                                <label for="totalIva">IVA</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Complete el campo</div>
                            </div>

                            <div class="form-floating mt-3 mb-3">
                                <select class="form-select" id="idcliente" placeholder="Estado" name="idcliente">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Cliente Frecuente</option>
                                    <option value="2">Cliente Potencial</option>
                                    <option value="3">Cliente Nuevo</option>
                                    <option value="4">Cliente Inactivo</option>
                                    <option value="5">Cliente VIP</option>
                                </select>
                                <label for="idcliente" class="form-label">Cliente</label>
                            </div>

                            <div class="form-floating mt-3 mb-3">
                                <select class="form-select" id="idpagos" placeholder="Estado" name="idpagos">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Parcial</option>
                                    <option value="2">Total</option>
                                </select>
                                <label for="idpagos" class="form-label">Pagos</label>
                            </div>

                            <div class="form-floating mt-3 mb-3">
                                <select class="form-select" id="idempleado" placeholder="Empleado" name="idempleado">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Pedro</option>
                                    <option value="2">Santiago</option>
                                    <option value="3">Valentina</option>
                                    <option value="4">Osman</option>
                                    <option value="5">Fulanito</option>
                                    <option value="6">Oscar</option>
                                    <option value="7">David</option>
                                </select>
                                <label for="idempleado" class="form-label">Empleado</label>
                            </div>
                        </div>
                    </div>
                
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="create">
    <div class="modal-dialog">
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
                    <button type="submit" id="submitordenpedido" class="hidden"></button>
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

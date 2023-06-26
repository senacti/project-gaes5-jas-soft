<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Nueva Postulación</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('postulacion.almacenar') }}" class="was-validated" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mt-3 mb-3">
                                <input type="datetime-local" required class="form-control" id="fechaPostulacion" placeholder="Fecha Postulación" name="fecha Postulación" maxlength="20">
                                <label for="fechaPostulacion">Fecha</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="DescripOferta" placeholder="Descripción de Oferta" name="DescripOferta" required>
                                <label for="DescripOferta">Descripción de Oferta</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Complete el campo</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="PerfilPostulacion" placeholder="Perfil Postulación" name="PerfilPostulacion" required>
                                <label for="PerfilPostulacion">Perfil de la Postulación</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Complete el campo</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="IdDetallesOferta" placeholder="Estado" name="IdDetallesOferta">
                                    <option value="0">Seleccione</option>
                                    <option value="2">Organizar los productos</option>
                                    <option value="8">Diseñar y modelar piezas y moldes para productos plásticos</option>
                                    <option value="9">Elaborar procesos de fabricación de productos plásticos</option>
                                    <option value="10">Coordinar y supervisar la producción de productos plásticos</option>
                                    <option value="11">Investigar y desarrollar nuevos productos plásticos</option>
                                    <option value="12">Realizar control de calidad en productos plásticos</option>
                                </select>
                                <label for="IdDetallesOferta" class="form-label">Detalles de Oferta</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="IdEstadoPostulaciones" placeholder="Estado" name="IdEstadoPostulaciones">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Inscrito</option>
                                    <option value="2">En Revisión</option>
                                    <option value="3">En Proceso</option>
                                    <option value="4">Rechazado</option>
                                    <option value="5">Retiro Voluntario</option>
                                    <option value="6">Proceso Concluido</option>
                                </select>
                                <label for="IdEstadoPostulaciones" class="form-label">Estado de la Postulación</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="IdEmpleado" placeholder="Empleado" name="IdEmpleado">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Pedro</option>
                                    <option value="2">Santiago</option>
                                    <option value="3">Valentina</option>
                                    <option value="4">Osman</option>
                                    <option value="5">Fulanito</option>
                                    <option value="6">Oscar</option>
                                    <option value="7">David</option>
                                </select>
                                <label for="IdEmpleado" class="form-label">Empleado</label>
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
</div>

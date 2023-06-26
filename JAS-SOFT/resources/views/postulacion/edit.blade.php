@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Postulacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Postulacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('postulacion.actualizarpostulacion') }}">

                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <input type="hidden" class="form-control" id="idpostulacion"
                                            placeholder="id" name="idpostulacion" required
                                            value="{{ $postulacion->IdPostulacion }}">
                                    </div>
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="datetime-local" required class="form-control" id="fechapostulacion"
                                            placeholder="Fecha Postulación" name="fechapostulacion"
                                            value="{{ $postulacion->FechaPostulacion }}">
                                        <label for="fechapostulacion">Fecha</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="descripoferta"
                                            placeholder="Descripción de Oferta" name="descripoferta" required
                                            value="{{ $postulacion->DescripOferta }}">
                                        <label for="descripoferta">Descripción de Oferta</label>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">Complete el campo</div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="perfilpostulacion"
                                            placeholder="Perfil Postulación" name="perfilpostulacion" required
                                            value="{{ $postulacion->PerfilPostulacion }}">
                                        <label for="perfilpostulacion">Perfil de la Postulación</label>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">Complete el campo</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="iddetallesoferta" placeholder="Estado"
                                            name="iddetallesoferta">
                                            <option value="0">Seleccione</option>
                                            <option value="2">Organizar los productos</option>
                                            <option value="8">Diseñar y modelar piezas y moldes para productos
                                                plásticos</option>
                                            <option value="9">Elaborar procesos de fabricación de productos plásticos
                                            </option>
                                            <option value="10">Coordinar y supervisar la producción de productos
                                                plásticos</option>
                                            <option value="11">Investigar y desarrollar nuevos productos plásticos
                                            </option>
                                            <option value="12">Realizar control de calidad en productos plásticos
                                            </option>
                                        </select>
                                        <label for="iddetallesoferta" class="form-label">Detalles de Oferta</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idestadopostulaciones" placeholder="Estado"
                                            name="idestadopostulaciones">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Inscrito</option>
                                            <option value="2">En Revisión</option>
                                            <option value="3">En Proceso</option>
                                            <option value="4">Rechazado</option>
                                            <option value="5">Retiro Voluntario</option>
                                            <option value="6">Proceso Concluido</option>
                                        </select>
                                        <label for="idestadopostulaciones" class="form-label">Estado de la
                                            Postulación</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="idempleado" placeholder="Empleado"
                                            name="idempleado">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Pedro</option>
                                            <option value="2">Santiago</option>
                                            <option value="3">Valentina</option>
                                            <option value="4">Osman</option>
                                            <option value="5">Fulanito</option>
                                            <option value="6">Alexander</option>
                                            <option value="7">David</option>
                                        </select>
                                        <label for="idempleado" class="form-label">Empleado</label>
                                    </div>
                                </div>
                                <button type="submit" id="submitpostulacion" class="hidden"></button>
                            </div>
                            <button type="submit">Guardar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection

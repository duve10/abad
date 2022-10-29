<!-- Add New -->

<div class="modal fade" id="addAuditoriaDetalle" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold" id="ModalLabel">Nuevo Auditoria Detalle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAddAuditoriaDetalle" method="POST" action="">
                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <select class="form-select" id="calificacion" name="idcalificacion" aria-label="calificacion">
                                    <option selected>Selecciona</option>
                                </select>
                                <label for="calificacion">Calificación</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="propiedad" name="idpropiedad" aria-label="propiedad">
                                    <option selected>Selecciona</option>
                                </select>
                                <label for="propiedad">Propiedad</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="proceso" name="idproceso" aria-label="proceso">
                                    <option selected>Selecciona</option>
                                </select>
                                <label for="proceso">Proceso</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="ciclo" name="idciclo" aria-label="ciclo">
                                    <option selected>Selecciona</option>
                                </select>
                                <label for="ciclo">Ciclo</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="transaccion" name="idtransaccion" aria-label="transaccion">
                                    <option selected>Selecciona</option>
                                </select>
                                <label for="transaccion">Transacción</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Objetivo de Control" id="objetivo" name="objectivo" style="height: 100px"></textarea>
                                <label for="objetivo">Objetivo de Control</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Riesgo" id="riesgo" name="riesgo" style="height: 100px"></textarea>
                                <label for="riesgo">Riesgo</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="actividad1" name="actividad1" id="actividad1" style="height: 100px"></textarea>
                                <label for="actividad1">Actividad de Control</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="actividad2" name="actividad2" id="actividad2" style="height: 100px"></textarea>
                                <label for="actividad2">Actividad de Control</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="componente1" name="idcomponente1" aria-label="componente1">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="componente1">Componente</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="componente2" name="idcomponente2" aria-label="componente2">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="componente2">Componente</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="componente3" name="idcomponente3" aria-label="componente3">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="componente3">Componente</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-floating">
                                <select class="form-select" id="componente4" name="idcomponente4" aria-label="componente4">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="componente4">Componente</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Aserciones" id="asercion1" style="height: 100px"></textarea>
                                <label for="asercion1">Aserciones Financieras CI</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="SOX CI" name="sox_ci" id="sox_ci" style="height: 100px"></textarea>
                                <label for="sox_ci">SOX CI</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="mb-2">
                                <label class="form-label">SOX AI</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sox_ai" id="sox_ai1">
                                <label class="form-check-label" for="sox_ai1">
                                    Si
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sox_ai" id="sox_ai2">
                                <label class="form-check-label" for="sox_ai2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Prioridad CI" name="prioridad_ci" id="prioridad_ci" style="height: 100px"></textarea>
                                <label for="prioridad_ci">Prioridad CI</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="mb-2">
                                <label class="form-label">Prioridad AI</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="prioridad_ai" id="prioridad_ai1">
                                <label class="form-check-label" for="prioridad_ai1">
                                    Control Clave
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="prioridad_ai" id="prioridad_ai2">
                                <label class="form-check-label" for="prioridad_ai2">
                                    Actividad de Control
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="act_ctrl" name="act_ctrl" placeholder="Act Ctrl">
                                <label for="act_ctrl">#Act Ctrl</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="periodo_cubierto" name="periodo_cubierto" placeholder="Periodo Cubierto">
                                <label for="periodo_cubierto"> Periodo Cubierto</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="existencia" name="existencia">
                                <label class="form-check-label" for="existencia">
                                    Existencia / Ocurrencia
                                </label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="revelacion" name="revelacion">
                                <label class="form-check-label" for="revelacion">
                                    Presentación / Revelación
                                </label>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="valuacion" name="valuacion">
                                <label class="form-check-label" for="valuacion">
                                    Valuación
                                </label>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="derechos" name="derechos">
                                <label class="form-check-label" for="derechos">
                                    Derechos / Obligaciones
                                </label>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="integridad" name="integridad">
                                <label class="form-check-label" for="integridad">
                                    Integridad
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="row g-3 mb-3 separador">
                        <div class="col-sm">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Diseño de la Prueba" name="diseno1" id="diseno1" style="height: 100px"></textarea>
                                <label for="diseno1">Diseño de la Prueba / Resultado</label>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Diseño de la Prueba" name="diseno2" id="diseno2" style="height: 100px"></textarea>
                                <label for="diseno2">Diseño de la Prueba / Resultado / Comentario</label>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Add New -->

<div class="modal fade" id="addEmpresa" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold" id="ModalLabel">Crear Nueva Empresa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAddEmpresa" method="POST" action="">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tip.Doc.</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="id_documento" id="id_documento" aria-label="Default select example">
                                <option value="1">D.N.I</option>
                                <option value="2">R.U.C.</option>
                            </select>

                        </div>
                        <label class="col-sm-2 col-form-label">Documento</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="documento" id="documento">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Razon Social</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="razon_social" id="razon_social">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Apellido Paterno</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Apellido Materno</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" autocomplete="off">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Direccion</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="direccion" id="direccion" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telefono" id="telefono" autocomplete="off">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="logo" name="logo">
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
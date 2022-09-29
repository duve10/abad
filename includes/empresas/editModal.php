<!-- Add New -->
<div class="modal fade" id="editEmpresa" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold" id="ModalLabel">Editar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  id="formEditUser" method="POST" action="">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Usuario</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" disabled name="nombre_usuario" id="nombre_usuario_edit" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control"  name="password" id="password_edit">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombres" id="nombres_edit" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Apellido Paterno</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno_edit" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Apellido Materno</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="apellido_materno" id="apellido_materno_edit" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tip.Doc.</label>
                        <div class="col-sm-4">
                            <select class="form-select" name="id_documento" id="id_documento_edit" aria-label="Default select example">
                                <option value="1">D.N.I</option>
                                <option value="2">R.U.C.</option>
                            </select>
                            
                        </div>
                        <label class="col-sm-2 col-form-label">Documento</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="documento" id="documento_edit">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Rol</label>
                        <div class="col-sm-10">
                        <select class="form-select" name="idrol" id="idrol_edit" aria-label="Default select example">
                                <option value="1">Administrador</option>
                                <option value="2">Auditor</option>
                            </select>
                        </div>
                    </div>
                   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="edit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Editar</a>
                    </form>
            </div>
        </div>
    </div>
</div>
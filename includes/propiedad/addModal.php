<!-- Add New -->

<div class="modal fade" id="addPropiedad" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold" id="ModalLabel">Crear Nueva Propiedad</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAddPropiedad" method="POST" action="">


                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Descripcion</label>

                    </div>
                    <div class="mb-3 row">

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="descripcion" id="descripcion">
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
<?php
require_once 'config/constants.php';
require_once 'controlador/empresa.function.php';


// Procedimientos
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//TITULO DE PAGINA
$titulo = "Empresas";
//ACTIVAR SIDEBAR MODULO
$active_empresas = "active";

//OBTENER LOS USUARIOS
$empresas = getEmpresas($_SESSION["id_usuario"], $_SESSION["idrol"]);

?>


<?php
include "includes/header.php";
?>
<div class="wrapper">
    <?php include "includes/sidebar.php" ?>

    <div class="main">
        <?php include "includes/navbar.php" ?>

        <main class="content">
            <div class="container-fluid p-0">
                <h1>Empresas</h1>
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addEmpresa">Agregar Empresas</button>
                <table id="tableEmpresas" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Nombre Empresa</th>
                            <th>Tipo Doc.</th>
                            <th>Documento</th>
                            <th>U.Creador</th>
                            <th class="text-center">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($empresas as $empresa) : ?>
                            <tr>
                                <td> <img src="img/logos/<?= $empresa["logo"] != '' ? $empresa["logo"] : "empresa_default.jpg"; ?>" width="48" height="48" class="rounded-circle me-2" alt="Avatar"></td>
                                <td><?= $empresa["razon_social"] . ' ' . $empresa["empresa"] . ' ' . $empresa["apellido_paterno"] . ' ' . $empresa["apellido_materno"]; ?></td>
                                <td><?= $empresa["tipo_doc"]; ?></td>
                                <td><?= $empresa["numero_doc"]; ?></td>
                                <td><?= $empresa["nombre_usuario"]; ?></td>
                                <td>
                                    <div class="td_acciones">
                                        <a class="a-editar" data-id="<?= $empresa["id"];  ?>" href="#"  data-bs-toggle="modal" data-bs-target="#editEmpresa">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </a>

                                        <a class="a-eliminar" id="<?= $empresa["id"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x align-middle me-2">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="18" y1="8" x2="23" y2="13"></line>
                                                <line x1="23" y1="8" x2="18" y2="13"></line>
                                            </svg>
                                        </a>

                                    </div>


                                </td>

                            </tr>
                        <?php endforeach; ?>


                    </tbody>

                </table>
            </div>
        </main>

        <?php include "includes/footer.php" ?>
    </div>
</div>

<?php include("includes/empresas/addModal.php"); ?>
<?php include("includes/empresas/editModal.php"); ?>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<script src="js/empresas/empresas.js"></script>


<?php include "includes/jsGeneral.php" ?>



</body>

</html>
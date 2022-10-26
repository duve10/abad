<?php
require_once 'config/constants.php';
require_once 'controlador/auditoriaDetalle.function.php';
require_once 'controlador/funciones.php';

// Procedimientos
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION["idrol"] == '2') {
    header('Location: ' . URL . '/');
}


//TITULO DE PAGINA
$titulo = "Auditorias Detalle";
//ACTIVAR SIDEBAR MODULO
$active_auditoria = "active";

$idempresa = $_GET["idempresa"];

//OBTENER LOS USUARIOS
$auditoriaDetalles = getAuditoriaDetalles($_SESSION["id_usuario"], $_SESSION["idrol"], $idempresa);

$empresa = '';
$empresa = extraeDatos('razon_social,id,nombre,apellido_paterno,apellido_materno','empresa','id',$idempresa);
$nombre_empresa = $empresa["razon_social"].' '.$empresa["nombre"]. ' '.$empresa["apellido_paterno"].' '.$empresa["apellido_materno"];
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
                <h1>Detalle Auditorias de <?= $nombre_empresa ?></h1>
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addCalificacion">Agregar Detalle</button>
                <table id="tableAuditoria" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>Orden</th>
                            <th>Documento</th>
                            <th>Empresa</th>
                            <th>Usuario</th>
                            <th class="text-center">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($auditoriaDetalles as $auditoriaDetalle) : ?>
                            <tr>
                                <td><?= $auditoria["contador"]; ?></td>
                                <td><?= $auditoria["documento"]; ?> </td>
                                <td><?= $auditoria["razon_social"] . ' ' . $auditoria["nombre"] . ' ' . $auditoria["apellido_paterno"] . ' ' . $auditoria["apellido_materno"]; ?> </td>
                                <td><?= $auditoria["nombre_usuario"]; ?> </td>
                                <td>
                                    <div class="td_acciones ">
                                        <a class="a-auditoria" href="auditoria_detalle/<?= $auditoria["id"];  ?>" data-id="<?= $auditoria["id"];  ?>">
                                            <i class="align-middle" data-feather="layers"></i>
                                        </a>

                                        <a class="a-eliminar" id="<?= $auditoria["id"]; ?>">
                                            <i class="align-middle" data-feather="user-x"></i>
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

<?php include("includes/auditoria/addModal.php"); ?>
<?php include("includes/auditoria/editModal.php"); ?>

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



<script src="<?= URL ?>/js/auditoria/auditoria.js"></script>


<?php
// include "/includes/jsGeneral.php" 
require_once($_SERVER['DOCUMENT_ROOT'] . '/abad_asociados/includes/jsGeneral.php');
?>





</body>

</html>
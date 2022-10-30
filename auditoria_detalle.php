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

$id_auditoria = $_GET["id_auditoria"];

//OBTENER LOS USUARIOS
$auditoriaDetalles = getAuditoriaDetalles($_SESSION["id_usuario"], $_SESSION["idrol"], $id_auditoria);

$idempresa =  $_GET["id_empresa"];


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
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addAuditoriaDetalle">Agregar Detalle</button>
                <table id="tableAuditoriaDetalle" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>Orden</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Propiedad</th>
                            <th>Proceso</th>
                            <th>Ciclo</th>
                            <th class="text-center">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($auditoriaDetalles as $auditoriaDetalle) : ?>
                            <tr>
                                <td><?= $auditoriaDetalle["contador"]; ?></td>
                                <td><?= date( 'd-m-Y H:i:s',strtotime($auditoriaDetalle["fecha_creacion"])); ?> </td>
                                <td><?= $auditoriaDetalle["nombre_usuario"]; ?> </td>
                                <td><?= $auditoriaDetalle["propiedad"]; ?> </td>
                                <td><?= $auditoriaDetalle["proceso"]; ?> </td>
                                <td><?= $auditoriaDetalle["ciclo"]; ?> </td>
                                <td>
                                    <div class="td_acciones ">
                                        <a class="a-auditoria" href="auditoria_detalle/<?= $auditoriaDetalle["id"];  ?>" data-id="<?= $auditoriaDetalle["id"];  ?>">
                                            <i class="align-middle" data-feather="edit-3"></i>
                                        </a>

                                        <a class="a-eliminar" id="<?= $auditoriaDetalle["id"]; ?>">
                                            <i class="align-middle" data-feather="delete"></i>
                                        </a>
                                        <a class="a-ver" id="<?= $auditoriaDetalle["id"]; ?>">
                                            <i class="align-middle" data-feather="eye"></i>
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

<?php include("includes/auditoriaDetalle/addModal.php"); ?>
<?php include("includes/auditoriaDetalle/editModal.php"); ?>

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



<script src="<?= URL ?>/js/auditoriaDetalle/auditoriaDetalle.js"></script>


<?php
// include "/includes/jsGeneral.php" 
require_once($_SERVER['DOCUMENT_ROOT'] . '/abad_asociados/includes/jsGeneral.php');
?>





</body>

</html>
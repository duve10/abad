<?php
require_once 'config/constants.php';
require_once 'controlador/funciones.php';

// Procedimientos
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION["idrol"] == '2') {
    header('Location: ' . URL . '/');
}

//TITULO DE PAGINA
$titulo = "Propiedades";

$controlador = "propiedad";
$idPropiedad = '';
$idProceso = '';
$idCiclo = '';
$nombre = '';
$nombre_tabla = "";
$edicion = "Propiedad";
$urlDato = 'propiedad';
$url_item = "";
$descripcion = "";
$descripcionPro = "";



if (isset($_GET["idPropiedad"])) {
    $idPropiedad = $_GET["idPropiedad"];
    $descripcion = quitarAcentos($_GET["descripcion"]);
    $titulo = "Proceso";
    $controlador = "proceso";
}


if (isset($_GET["idProceso"])) {
    $idProceso = $_GET["idProceso"];
    $descripcionPro = quitarAcentos($_GET["descripcionPro"]);
    $titulo = "Ciclo";
    $controlador = "ciclo";
}

if (isset($_GET["idCiclo"])) {
    $idCiclo = $_GET["idCiclo"];
    $titulo = "Transacción";
    $controlador = "transaccion";
}


require_once 'controlador/' . $controlador . '.function.php';

//ACTIVAR SIDEBAR MODULO
$active_maestros = "active";
$active_propiedad = "active";


$datos = [];
//OBTENER LOS USUARIOS
if ($idPropiedad == '') {
    $datos = getPropiedades($_SESSION["id_usuario"], $_SESSION["idrol"]);
    $nombre_tabla = 'Propiedades';
    $url_item = URL . '/propiedad/';
} else {

    if ($idProceso == '') {
        $datos = getProcesos($_SESSION["id_usuario"], $_SESSION["idrol"], $idPropiedad);
        $nombre = extraeDato("descripcion", "propiedad", "id", $idPropiedad);
        $nombre_tabla = 'Procesos - ' . $nombre;
        $edicion = "Proceso";
        $url_item = URL . '/propiedad/' . $idPropiedad . '/' . $descripcion . '/';
    } else {

        if ($idCiclo == '') {
            $datos = getCiclos($_SESSION["id_usuario"], $_SESSION["idrol"], $idProceso);
            $nombre = extraeDato("descripcion", "proceso", "id", $idProceso);
            $nombre_tabla = 'Ciclo - ' . $nombre;
            $edicion = "Ciclo";
            $url_item = URL . '/propiedad/' . $idPropiedad . '/' . $descripcion . '/' . $idProceso . '/' . $descripcionPro . '/';
        } else {
            $datos = getTransacciones($_SESSION["id_usuario"], $_SESSION["idrol"], $idCiclo);
            $nombre = extraeDato("descripcion", "ciclo", "id", $idCiclo);
            $nombre_tabla = 'Transacción - ' . $nombre;
            $edicion = "Transaccion";
            $url_item = URL . '/propiedad/' . $idPropiedad . '/' . $descripcion . '/' . $idProceso . '/' . $descripcionPro . '/';
        }
    }
}

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
                <h1><?= $nombre_tabla ?></h1>
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#add<?= $edicion ?>">Agregar <?= $edicion; ?></button>
                <table id="table<?= $edicion ?>" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>Orden</th>
                            <th>Descripción</th>
                            <th class="text-center">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) : ?>
                            <tr>
                                <td><?= $dato["contador"]; ?></td>
                                <td>
                                    <a href="<?= $url_item . $dato["id"] . '/' . quitarAcentos(str_replace(" ", "-", $dato["descripcion"])); ?>"><?= $dato["descripcion"]; ?></a>
                                </td>
                                <td>
                                    <div class="td_acciones ">
                                        <a class="a-editar" data-id="<?= $dato["id"];  ?>" data-bs-toggle="modal" data-bs-target="#edit<?= $edicion ?>">
                                            <i class="align-middle" data-feather="edit"></i>
                                        </a>

                                        <a class="a-eliminar" id="<?= $dato["id"]; ?>">
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

<?php include("includes/" . $controlador . "/addModal.php"); ?>
<?php include("includes/" . $controlador . "/editModal.php"); ?>

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



<script src="<?= URL ?>/js/<?= $controlador ?>/<?= $controlador ?>.js"></script>


<?php
// include "/includes/jsGeneral.php" 
require_once($_SERVER['DOCUMENT_ROOT'] . '/abad_asociados/includes/jsGeneral.php');
?>





</body>

</html>
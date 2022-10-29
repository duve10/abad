<?php

require_once "../db/transaccion.class.php";

if (isset($_GET["id_ciclo"])) {
    $id_ciclo = $_GET["id_ciclo"];
    $transacciones = [];
    $json = new Transaccion();
    $transacciones = $json->getTransaccionesApi($id_ciclo);
    echo $transacciones;
}

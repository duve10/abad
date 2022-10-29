<?php

require_once "../db/ciclo.class.php";

if (isset($_GET["id_proceso"])) {
    $id_proceso = $_GET["id_proceso"];
    $ciclos = [];
    $json = new Ciclo();
    $ciclos = $json->getCiclosApi($id_proceso);
    echo $ciclos;
}

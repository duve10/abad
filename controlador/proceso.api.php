<?php

require_once "../db/proceso.class.php";

if(isset($_GET["id_propiedad"])){
    $id_propiedad = $_GET["id_propiedad"];
    $procesos = [];
    $json = new Proceso();
    $procesos = $json->getProcesosApi($id_propiedad);
    echo $procesos;
}


<?php
require_once "db/proceso.class.php";



function getProcesos($iduser, $idrol, $idPropiedad)
{
    $data = new Proceso();
    $procesos = $data->getProcesos($iduser, $idrol, $idPropiedad);
    return $procesos;
}

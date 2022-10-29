<?php
require_once "db/ciclo.class.php";



function getCiclos($iduser, $idrol, $idProceso)
{
    $data = new Ciclo();
    $ciclos = $data->getCiclos($iduser, $idrol, $idProceso);
    return $ciclos;
}

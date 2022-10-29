<?php
require_once "db/transaccion.class.php";



function getTransacciones($iduser, $idrol, $idCiclo)
{
    $data = new Transaccion();
    $transacciones = $data->getTransacciones($iduser, $idrol, $idCiclo);
    return $transacciones;
}

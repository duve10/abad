<?php
require_once "db/calificacion.class.php";



function getCalificaciones($iduser,$idrol)
{
    $data = new Calificacion();
    $calificaciones = $data->getCalificaciones($iduser,$idrol);
    return $calificaciones;
}

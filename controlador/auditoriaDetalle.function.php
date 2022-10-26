<?php
require_once "db/auditoriaDetalle.class.php";



function getAuditoriaDetalles($iduser,$idrol,$id_auditoria)
{
    $data = new AuditoriaDetalle();
    $auditoriaDetalles = $data->getAuditoriaDetalles($iduser,$idrol,$id_auditoria);
    return $auditoriaDetalles;
}


<?php
require_once "db/auditoria.class.php";



function getAuditorias($iduser,$idrol)
{
    $data = new Auditoria();
    $auditorias = $data->getAuditorias($iduser,$idrol);
    return $auditorias;
}


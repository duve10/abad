<?php
require_once "db/empresa.class.php";



function getEmpresas($iduser,$idrol)
{
    $data = new Empresa();
    $empresas = $data->getEmpresas($iduser,$idrol);
    return $empresas;
}

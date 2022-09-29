<?php
require_once "db/empresa.class.php";

function getEmpresas()
{
    $data = new Empresa();
    $empresas = $data->getEmpresas();
    return $empresas;
}

<?php

require_once "../db/empresa.class.php";

if(isset($_GET["name"])){
    $name = '';
    $name = $_GET["name"];
    $json = new Empresa();
    $empresas = $json->getEmpresaByName($name);
    echo $empresas;
}

if(isset($_GET["doc"])){
    $doc = '';
    $doc = $_GET["doc"];
    $json = new Empresa();
    $auditorias = $json->getEmpresaByDocument($doc);
    echo $auditorias;
}
?>
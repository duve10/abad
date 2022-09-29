<?php

session_start();


if (isset($_SESSION["login"])) {
    
    require_once "../db/empresa.class.php";
    require "funciones.php";



    $idEmpresa = isset($_POST["idEmpresa"]) ? $_POST["idEmpresa"] : "";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $id_documento = isset($_POST["id_documento"]) ? $_POST["id_documento"] : "";
    $id_usuario_creador = isset($_POST["id_usuario_creador"]) ? $_POST["id_usuario_creador"] : "";


    $userEmpresa = new Empresa();
    $userEmpresa->setId(escaparDatos($idEmpresa));
    $userEmpresa->setNombre(escaparDatos($nombre));
    $userEmpresa->setId_documento(escaparDatos($id_documento));
    $userEmpresa->setId_usuario_creador(escaparDatos($id_usuario_creador));

    if (isset($_POST["save"])) {
        $userEmpresa->insertEmpresa();
    }

    if (isset($_POST["edit"])) {

        $userEmpresa->updateEmpresa();
    }

    if (isset($_POST["delete"])) {
        $userEmpresa->deleteEmpresa();
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $userEmpresa->getEmpresa();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

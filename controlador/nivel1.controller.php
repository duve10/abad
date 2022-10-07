<?php

session_start();

if (isset($_SESSION["login"])) {

    require_once "../db/nivel1.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $respuesta = [
        "error" => false,
        "mensaje" => ""
    ];


    $idNivel1 = isset($_POST["idNivel1"]) ? $_POST["idNivel1"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $id_usuario_creador = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";

    $nivel1Class = new Nivel1();
    $nivel1Class->setId(escaparDatos($idEmpresa));
    $nivel1Class->setDescripcion(escaparDatos(trim($descripcion)));
    $nivel1Class->setId_usuario_creador(escaparDatos($id_usuario_creador));

    /**VALIDAR QUE CAMPOS ESTEN LLENOS */
    if (!isset($_POST["consultar"]) && !isset($_POST["delete"]) && $descripcion == '') {
        $respuesta["error"] = true;
        $respuesta["mensaje"] = "Llenar campos correctamente";

        echo json_encode($respuesta);
        die;
    }

    /**VALIDAMOS RUC */
    if (!isset($_POST["edit"])) {
        $existeDecripcion = existeDato("nivel1", "descripcion", trim($descripcion));
        if ($existeDocumento > 0) {
            $respuesta["error"] = true;
            $respuesta["mensaje"] = "Descripcion ya existe";

            echo json_encode($respuesta);
            die;
        }
    }


    if (isset($_POST["save"])) {

        $nivel1Class->inserNivel1();
        $respuesta["mensaje"] = "Guardado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["edit"])) {

        $nivel1Class->updateNivel1();
        $respuesta["mensaje"] = "Editado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["delete"])) {
        $nivel1Class->deleteNivel1();
        echo json_encode($respuesta);
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $nivel1Class->getNivel1_1();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

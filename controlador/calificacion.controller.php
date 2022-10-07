<?php

session_start();

if (isset($_SESSION["login"])) {

    require_once "../db/calificacion.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $respuesta = [
        "error" => false,
        "mensaje" => ""
    ];


    $idCalificacion = isset($_POST["idCalificacion"]) ? $_POST["idCalificacion"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $id_usuario_creador = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";

    $calificacionClass = new Calificacion();
    $calificacionClass->setId(escaparDatos($idCalificacion));
    $calificacionClass->setDescripcion(escaparDatos(trim($descripcion)));
    $calificacionClass->setId_usuario_creador(escaparDatos($id_usuario_creador));

    /**VALIDAR QUE CAMPOS ESTEN LLENOS */
    if (!isset($_POST["consultar"]) && !isset($_POST["delete"]) && $descripcion == '') {
        $respuesta["error"] = true;
        $respuesta["mensaje"] = "Llenar campos correctamente";

        echo json_encode($respuesta);
        die;
    }

    /**VALIDAMOS RUC */
    if (!isset($_POST["edit"])) {
        $existeDecripcion = existeDato("calificacion", "descripcion", trim($descripcion));
        if ($existeDecripcion > 0) {
            $respuesta["error"] = true;
            $respuesta["mensaje"] = "Descripcion ya existe";

            echo json_encode($respuesta);
            die;
        }
    }


    if (isset($_POST["save"])) {

        $calificacionClass->insertCalificacion();
        $respuesta["mensaje"] = "Guardado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["edit"])) {

        $calificacionClass->updateCalificacion();
        $respuesta["mensaje"] = "Editado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["delete"])) {
        $calificacionClass->deleteCalificacion();
        echo json_encode($respuesta);
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $calificacionClass->getCalificacion();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

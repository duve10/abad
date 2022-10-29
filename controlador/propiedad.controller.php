<?php

session_start();

if (isset($_SESSION["login"])) {

    require_once "../db/propiedad.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $respuesta = [
        "error" => false,
        "mensaje" => ""
    ];


    $idPropiedad = isset($_POST["idPropiedad"]) ? $_POST["idPropiedad"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $id_usuario_creador = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";

    $propiedadClass = new Propiedad();
    $propiedadClass->setId(escaparDatos($idPropiedad));
    $propiedadClass->setDescripcion(escaparDatos(trim($descripcion)));
    $propiedadClass->setId_usuario_creador(escaparDatos($id_usuario_creador));

    /**VALIDAR QUE CAMPOS ESTEN LLENOS */
    if (!isset($_POST["consultar"]) && !isset($_POST["delete"]) && $descripcion == '') {
        $respuesta["error"] = true;
        $respuesta["mensaje"] = "Llenar campos correctamente";

        echo json_encode($respuesta);
        die;
    }

    /**VALIDAMOS RUC */
    if (isset($_POST["save"])) {
        $existeDecripcion = existeDato("calificacion", "descripcion", trim($descripcion));
        if ($existeDecripcion > 0) {
            $respuesta["error"] = true;
            $respuesta["mensaje"] = "Descripcion ya existe";

            echo json_encode($respuesta);
            die;
        }
    }

        /**VALIDAMOS RUC */
        if (isset($_POST["edit"])) {
            $existeDecripcion = existeDatoUpdate("propiedad", "descripcion", trim($descripcion),$idPropiedad);
            if ($existeDecripcion > 0) {
                $respuesta["error"] = true;
                $respuesta["mensaje"] = "Descripcion ya existe";
    
                echo json_encode($respuesta);
                die;
            }
        }
    

    if (isset($_POST["save"])) {

        $propiedadClass->insertPropiedad();
        $respuesta["mensaje"] = "Guardado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["edit"])) {

        $propiedadClass->updatePropiedad();
        $respuesta["mensaje"] = "Editado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["delete"])) {
        $propiedadClass->deletePropiedad();
        echo json_encode($respuesta);
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $propiedadClass->getPropiedad();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

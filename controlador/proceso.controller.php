<?php

session_start();

if (isset($_SESSION["login"])) {

    require_once "../db/proceso.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $respuesta = [
        "error" => false,
        "mensaje" => ""
    ];


    $idProceso = isset($_POST["idProceso"]) ? $_POST["idProceso"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $id_usuario_creador = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";
    $idPropiedad = isset($_POST["idPropiedad"]) ? $_POST["idPropiedad"] : "";

    $procesoClass = new Proceso();
    $procesoClass->setId(escaparDatos($idProceso));
    $procesoClass->setDescripcion(escaparDatos(trim($descripcion)));
    $procesoClass->setId_usuario_creador($id_usuario_creador);
    $procesoClass->setId_propiedad($idPropiedad);

    /**VALIDAR QUE CAMPOS ESTEN LLENOS */
    if (!isset($_POST["consultar"]) && !isset($_POST["delete"]) && $descripcion == '') {
        $respuesta["error"] = true;
        $respuesta["mensaje"] = "Llenar campos correctamente";

        echo json_encode($respuesta);
        die;
    }

    /**VALIDAMOS RUC */
    if (isset($_POST["save"])) {
        $existeDecripcion = existeDato("proceso", "descripcion", trim($descripcion), "id_propiedad", $idPropiedad );
        if ($existeDecripcion > 0) {
            $respuesta["error"] = true;
            $respuesta["mensaje"] = "Descripcion ya existe";

            echo json_encode($respuesta);
            die;
        }
    }

        /**VALIDAMOS RUC */
        if (isset($_POST["edit"])) {
            $existeDecripcion = existeDatoUpdatePorTabla("propiedad", "descripcion", trim($descripcion),$idProceso, "id_propiedad", $idPropiedad);
            if ($existeDecripcion > 0) {
                $respuesta["error"] = true;
                $respuesta["mensaje"] = "Descripcion ya existe";
    
                echo json_encode($respuesta);
                die;
            }
        }
    

    if (isset($_POST["save"])) {

        $procesoClass->insertProceso();
        $respuesta["mensaje"] = "Guardado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["edit"])) {

        $procesoClass->updateProceso();
        $respuesta["mensaje"] = "Editado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["delete"])) {
        $procesoClass->deleteProceso();
        echo json_encode($respuesta);
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $procesoClass->getProceso();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

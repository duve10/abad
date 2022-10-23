<?php

session_start();

if (isset($_SESSION["login"])) {

    require_once "../db/ciclo.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $respuesta = [
        "error" => false,
        "mensaje" => ""
    ];


    $idCiclo = isset($_POST["idCiclo"]) ? $_POST["idCiclo"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $id_usuario_creador = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";
    $idProceso = isset($_POST["idProceso"]) ? $_POST["idProceso"] : "";

    $cicloClass = new Ciclo();
    $cicloClass->setId(escaparDatos($idProceso));
    $cicloClass->setDescripcion(escaparDatos(trim($descripcion)));
    $cicloClass->setId_usuario_creador($id_usuario_creador);
    $cicloClass->setId_proceso($idProceso);



    /**VALIDAR QUE CAMPOS ESTEN LLENOS */
    if (!isset($_POST["consultar"]) && !isset($_POST["delete"]) && $descripcion == '') {
        $respuesta["error"] = true;
        $respuesta["mensaje"] = "Llenar campos correctamente";

        echo json_encode($respuesta);
        die;
    }

    /**VALIDAMOS RUC */
    if (isset($_POST["save"])) {
        $existeDecripcion = existeDato("ciclo", "descripcion", trim($descripcion), "id_proceso", $idProceso );
        if ($existeDecripcion > 0) {
            $respuesta["error"] = true;
            $respuesta["mensaje"] = "Descripcion ya existe";

            echo json_encode($respuesta);
            die;
        }
    }

        /**VALIDAMOS RUC */
        if (isset($_POST["edit"])) {
            $existeDecripcion = existeDatoUpdatePorTabla("ciclo", "descripcion", trim($descripcion),$idCiclo, "id_proceso", $idProceso);
            if ($existeDecripcion > 0) {
                $respuesta["error"] = true;
                $respuesta["mensaje"] = "Descripcion ya existe";
    
                echo json_encode($respuesta);
                die;
            }
        }
    

    if (isset($_POST["save"])) {

        $respuesta["dato"] = $cicloClass->insertCiclo();
        $respuesta["mensaje"] = "Guardado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["edit"])) {

        $cicloClass->updateCiclo();
        $respuesta["mensaje"] = "Editado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["delete"])) {
        $cicloClass->deleteCiclo();
        echo json_encode($respuesta);
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $cicloClass->getCiclo();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

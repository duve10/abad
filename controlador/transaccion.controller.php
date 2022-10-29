<?php

session_start();

if (isset($_SESSION["login"])) {

    require_once "../db/transaccion.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $respuesta = [
        "error" => false,
        "mensaje" => ""
    ];


    $idTransaccion = isset($_POST["idTransaccion"]) ? $_POST["idTransaccion"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $id_usuario_creador = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";
    $idCiclo = isset($_POST["idCiclo"]) ? $_POST["idCiclo"] : "";

    $transaccionClass = new Transaccion();
    $transaccionClass->setId(escaparDatos($idTransaccion));
    $transaccionClass->setDescripcion(escaparDatos(trim($descripcion)));
    $transaccionClass->setId_usuario_creador($id_usuario_creador);
    $transaccionClass->setId_ciclo($idCiclo);



    /**VALIDAR QUE CAMPOS ESTEN LLENOS */
    if (!isset($_POST["consultar"]) && !isset($_POST["delete"]) && $descripcion == '') {
        $respuesta["error"] = true;
        $respuesta["mensaje"] = "Llenar campos correctamente";

        echo json_encode($respuesta);
        die;
    }

    /**VALIDAMOS RUC */
    if (isset($_POST["save"])) {
        $existeDecripcion = existeDato("transaccion", "descripcion", trim($descripcion), "id_ciclo", $idCiclo );
        if ($existeDecripcion > 0) {
            $respuesta["error"] = true;
            $respuesta["mensaje"] = "Descripcion ya existe";

            echo json_encode($respuesta);
            die;
        }
    }

        /**VALIDAMOS RUC */
        if (isset($_POST["edit"])) {
            $existeDecripcion = existeDatoUpdatePorTabla("transaccion", "descripcion", trim($descripcion),$idTransaccion, "id_ciclo", $idCiclo);
            if ($existeDecripcion > 0) {
                $respuesta["error"] = true;
                $respuesta["mensaje"] = "Descripcion ya existe";
    
                echo json_encode($respuesta);
                die;
            }
        }
    

    if (isset($_POST["save"])) {

        $respuesta["dato"] = $transaccionClass->insertTransaccion();
        $respuesta["mensaje"] = "Guardado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["edit"])) {

        $transaccionClass->updateTransaccion();
        $respuesta["mensaje"] = "Editado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["delete"])) {
        $transaccionClass->deleteTransaccion();
        echo json_encode($respuesta);
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $transaccionClass->getTransaccion();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

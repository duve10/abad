<?php

session_start();

if (isset($_SESSION["login"])) {

    require_once "../db/auditoria.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $respuesta = [
        "error" => false,
        "mensaje" => ""
    ];

    $idAuditoria = isset($_POST["idAuditoria"]) ? $_POST["idAuditoria"] : "";
    $id_empresa = isset($_POST["id_empresa"]) ? $_POST["id_empresa"] : "";
    $id_usuario_creador = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";

    $auditoriaClass = new Auditoria();
    $auditoriaClass->setId(escaparDatos($idAuditoria));
    $auditoriaClass->setId_empresa(escaparDatos($id_empresa));
    $auditoriaClass->setId_usuario_creador(escaparDatos($id_usuario_creador));

    /**VALIDAR QUE CAMPOS ESTEN LLENOS */
    if (!isset($_POST["consultar"]) && !isset($_POST["delete"]) && $id_empresa == '') {
        $respuesta["error"] = true;
        $respuesta["mensaje"] = "Llenar campos correctamente";

        echo json_encode($respuesta);
        die;
    }

    /**VALIDAMOS RUC */
    if (isset($_POST["save"])) {
        $existeEmpresa = existeDato("auditoria", "id_empresa", $id_empresa);
        if ($existeEmpresa > 0) {
            $respuesta["error"] = true;
            $respuesta["mensaje"] = "Empresa ya creada";

            echo json_encode($respuesta);
            die;
        }
    }


        // if (isset($_POST["edit"])) {    
        //     $existeDecripcion = existeDatoUpdate("calificacion", "descripcion", trim($descripcion),$idCalificacion);
        //     if ($existeDecripcion > 0) {
        //         $respuesta["error"] = true;
        //         $respuesta["mensaje"] = "Descripcion ya existe";
    
        //         echo json_encode($respuesta);
        //         die;
        //     }
        // }
    

    if (isset($_POST["save"])) {

        $auditoriaClass->insertAuditoria();
        $respuesta["mensaje"] = "Guardado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["edit"])) {

        $auditoriaClass->updateAuditoria();
        $respuesta["mensaje"] = "Editado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["delete"])) {
        $auditoriaClass->deleteAuditoria();
        echo json_encode($respuesta);
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $auditoriaClass->getAuditoria();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

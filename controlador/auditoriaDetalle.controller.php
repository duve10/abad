<?php

session_start();

if (isset($_SESSION["login"])) {

    require_once "../db/auditoria_detalle.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $respuesta = [
        "error" => false,
        "mensaje" => ""
    ];

    $idAuditoriaDetalle = isset($_POST["idAuditoriaDetalle"]) ? $_POST["idAuditoriaDetalle"] : "";
    $id_usuario_creador = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";
    $objetivo = isset($_POST["objetivo"]) ?  $_POST["objetivo"] : "";
    $id_propiedad = isset($_POST["id_propiedad"]) ?  $_POST["id_propiedad"] : "";
    $id_proceso = isset($_POST["id_proceso"]) ?  $_POST["id_proceso"] : "";
    $id_ciclo = isset($_POST["id_ciclo"]) ?  $_POST["id_ciclo"] : "";
    $id_transaccion = isset($_POST["id_transaccion"]) ?  $_POST["id_transaccion"] : "";
    $id_calificacion = isset($_POST["id_calificacion"]) ?  $_POST["id_calificacion"] : "";
    $id_componente1 = isset($_POST["id_componente1"]) ?  $_POST["id_componente1"] : "";
    $id_componente2 = isset($_POST["id_componente2"]) ?  $_POST["id_componente2"] : "";
    $id_componente3 = isset($_POST["id_componente3"]) ?  $_POST["id_componente3"] : "";
    $id_componente4 = isset($_POST["id_componente4"]) ?  $_POST["id_componente4"] : "";
    $rieso = isset($_POST["rieso"]) ?  $_POST["rieso"] : "";
    $actividad1 = isset($_POST["actividad1"]) ?  $_POST["actividad1"] : "";
    $actividad2 = isset($_POST["actividad2"]) ?  $_POST["actividad2"] : "";
    $asercion1 = isset($_POST["asercion1"]) ?  $_POST["asercion1"] : "";
    $asercion2 = isset($_POST["asercion2"]) ?  $_POST["asercion2"] : "";
    $asercion3 = isset($_POST["asercion3"]) ?  $_POST["asercion3"] : "";
    $sox_ci = isset($_POST["sox_ci"]) ?  $_POST["sox_ci"] : "";
    $sox_ai = isset($_POST["sox_ai"]) ?  $_POST["sox_ai"] : "";
    $prioridad_ci = isset($_POST["prioridad_ci"]) ?  $_POST["prioridad_ci"] : "";
    $prioridad_ai = isset($_POST["prioridad_ai"]) ?  $_POST["prioridad_ai"] : "";
    $act_ctrl = isset($_POST["act_ctrl"]) ?  $_POST["act_ctrl"] : "";
    $periodo_cubierto = isset($_POST["periodo_cubierto"]) ?  $_POST["periodo_cubierto"] : "";
    $existencia = isset($_POST["existencia"]) ?  $_POST["existencia"] : "";
    $revelacion = isset($_POST["revelacion"]) ?  $_POST["revelacion"] : "";
    $valuacion = isset($_POST["valuacion"]) ?  $_POST["valuacion"] : "";
    $derechos = isset($_POST["derechos"]) ?  $_POST["derechos"] : "";
    $integridad = isset($_POST["integridad"]) ?  $_POST["integridad"] : "";
    $diseno1 = isset($_POST["diseno1"]) ?  $_POST["diseno1"] : "";
    $diseno2 = isset($_POST["diseno2"]) ?  $_POST["diseno2"] : "";
    $id_auditoria = isset($_POST["id_auditoria"]) ?  $_POST["id_auditoria"] : "";



    $auditoriaDetalleClass = new AuditoriaDetalle();
    $auditoriaDetalleClass->setId(escaparDatos($idAuditoriaDetalle));
    $auditoriaDetalleClass->setId_usuario_creador(escaparDatos($id_usuario_creador));
    $auditoriaDetalleClass->setObjetivo(escaparDatos($objetivo));
    $auditoriaDetalleClass->setId_propiedad(escaparDatos($id_propiedad));
    $auditoriaDetalleClass->setId_proceso(escaparDatos($id_proceso));
    $auditoriaDetalleClass->setId_ciclo(escaparDatos($id_ciclo));
    $auditoriaDetalleClass->setId_transaccion(escaparDatos($id_transaccion));
    $auditoriaDetalleClass->setId_calificacion(escaparDatos($id_calificacion));
    $auditoriaDetalleClass->setId_componente1(escaparDatos($id_componente1));
    $auditoriaDetalleClass->setId_componente2(escaparDatos($id_componente2));
    $auditoriaDetalleClass->setId_componente3(escaparDatos($id_componente3));
    $auditoriaDetalleClass->setId_componente4(escaparDatos($id_componente4));
    $auditoriaDetalleClass->setRieso(escaparDatos($rieso));
    $auditoriaDetalleClass->setActividad1(escaparDatos($actividad1));
    $auditoriaDetalleClass->setActividad2(escaparDatos($actividad2));
    $auditoriaDetalleClass->setAsercion1(escaparDatos($asercion1));
    $auditoriaDetalleClass->setAsercion2(escaparDatos($asercion2));
    $auditoriaDetalleClass->setAsercion3(escaparDatos($asercion3));
    $auditoriaDetalleClass->setSox_ci(escaparDatos($sox_ci));
    $auditoriaDetalleClass->setSox_ai(escaparDatos($sox_ai));
    $auditoriaDetalleClass->setPrioridad_ci(escaparDatos($prioridad_ci));
    $auditoriaDetalleClass->setPrioridad_ai(escaparDatos($prioridad_ai));
    $auditoriaDetalleClass->setAct_ctrl(escaparDatos($act_ctrl));
    $auditoriaDetalleClass->setPeriodo_cubierto(escaparDatos($periodo_cubierto));
    $auditoriaDetalleClass->setExistencia(escaparDatos($existencia));
    $auditoriaDetalleClass->setRevelacion(escaparDatos($revelacion));
    $auditoriaDetalleClass->setValuacion(escaparDatos($valuacion));
    $auditoriaDetalleClass->setDerechos(escaparDatos($derechos));
    $auditoriaDetalleClass->setIntegridad(escaparDatos($integridad));
    $auditoriaDetalleClass->setDiseno1(escaparDatos($diseno1));
    $auditoriaDetalleClass->setDiseno2(escaparDatos($diseno2));
    $auditoriaDetalleClass->setId_auditoria(escaparDatos($id_auditoria));



    /**VALIDAR QUE CAMPOS ESTEN LLENOS */
    if (!isset($_POST["consultar"]) && !isset($_POST["delete"]) && $objetivo == '') {
        $respuesta["error"] = true;
        $respuesta["mensaje"] = "Llenar campos correctamente";

        echo json_encode($respuesta);
        die;
    }

    /**VALIDAMOS RUC */
    // if (isset($_POST["save"])) {
    //     $existeEmpresa = existeDato("auditoria", "id_empresa", $id_empresa);
    //     if ($existeEmpresa > 0) {
    //         $respuesta["error"] = true;
    //         $respuesta["mensaje"] = "Empresa ya creada";

    //         echo json_encode($respuesta);
    //         die;
    //     }
    // }


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

        $auditoriaDetalleClass->insertDetalleAuditoria();
        $respuesta["mensaje"] = "Guardado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["edit"])) {

        $auditoriaDetalleClass->updateAuditoriaDetalle();
        $respuesta["mensaje"] = "Editado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["delete"])) {
        $auditoriaDetalleClass->deleteAuditoriaDetalle();
        echo json_encode($respuesta);
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $auditoriaDetalleClass->getAuditoriaDetalle();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

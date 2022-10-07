<?php

session_start();

if (isset($_SESSION["login"])) {

    require_once "../db/empresa.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $carpetaImagenEmpresa = "../img/logos/";
    $respuesta = [
        "error" => false,
        "mensaje" => ""
    ];


    $idEmpresa = isset($_POST["idEmpresa"]) ? $_POST["idEmpresa"] : "";
    $razon_social = isset($_POST["razon_social"]) ? $_POST["razon_social"] : "";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $apellido_paterno = isset($_POST["apellido_paterno"]) ? $_POST["apellido_paterno"] : "";
    $apellido_materno = isset($_POST["apellido_materno"]) ? $_POST["apellido_materno"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
    $id_documento = isset($_POST["id_documento"]) ? $_POST["id_documento"] : "";
    $documento = isset($_POST["documento"]) ? $_POST["documento"] : "";
    $id_usuario_creador = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";
    $logo = isset($_FILES["logo"]) ? $_FILES["logo"] : "";
    $logoEditado = isset($_POST["logoEditado"]) ? $_POST["logoEditado"] : "";
    $nombreEditado = isset($_POST["nombreEditado"]) ? $_POST["nombreEditado"] : "";

    $empresaClass = new Empresa();
    $empresaClass->setId(escaparDatos($idEmpresa));
    $empresaClass->setRazon_social(escaparDatos($razon_social));
    $empresaClass->setNombre(escaparDatos($nombre));
    $empresaClass->setApellido_paterno(escaparDatos($apellido_paterno));
    $empresaClass->setApellido_paterno(escaparDatos($apellido_materno));
    $empresaClass->setDireccion(escaparDatos($direccion));
    $empresaClass->setTelefono(escaparDatos($telefono));
    $empresaClass->setId_documento(escaparDatos($id_documento));
    $empresaClass->setDocumento(escaparDatos($documento));
    $empresaClass->setId_usuario_creador(escaparDatos($id_usuario_creador));

    /**VALIDAR QUE CAMPOS ESTEN LLENOS */
    if (!isset($_POST["consultar"]) && !isset($_POST["delete"]) && (($razon_social == '' && ($nombre == '' && $apellido_paterno == '' && $apellido_materno == '')) || $documento == '')) {
        $respuesta["error"] = true;
        $respuesta["mensaje"] = "Llenar campos correctamente";

        echo json_encode($respuesta);
        die;
    }

    /**VALIDAMOS RUC */
    if (!isset($_POST["edit"])) {
        $existeDocumento = existeDato("empresa", "documento", $documento);
        if ($existeDocumento > 0) {
            $respuesta["error"] = true;
            $respuesta["mensaje"] = "Documento ya existe";

            echo json_encode($respuesta);
            die;
        }
    }


    /**VALIDACION PARA IMAGENES */
    $logoNombre = $logoEditado;
    $imagenNombre = $nombreEditado;

    if (isset($logo["name"])) {

        if ($logo["name"] != '') {

            if ($logoEditado != '') {
                unlink($carpetaImagenEmpresa . $logoEditado);
            }

            $imagenNombre = $logo["name"];
            $empresaClass->setLogo_nombre($imagenNombre);

            if (!is_dir($carpetaImagenEmpresa)) {
                mkdir($carpetaImagenEmpresa);
            }
            // generando nombre unico
            $extension = explode(".", $logo["name"]);
            $extension = end($extension);
            $logoNombre = md5(uniqid(rand(), true)) . "." . $extension;

            if ($logo != '') {
                move_uploaded_file($logo["tmp_name"], $carpetaImagenEmpresa . $logoNombre);
            }
        }
    } else {
        $empresaClass->setLogo_nombre($imagenNombre);
    }



    $empresaClass->setLogo($logoNombre);


    if (isset($_POST["save"])) {

        $empresaClass->insertEmpresa();
        $respuesta["mensaje"] = "Guardado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["edit"])) {

        $empresaClass->updateEmpresa();
        $respuesta["mensaje"] = "Editado Correctamente";
        echo json_encode($respuesta);
    }

    if (isset($_POST["delete"])) {
        $empresaClass->deleteEmpresa();
        echo json_encode($respuesta);
    }

    if (isset($_POST["consultar"])) {
        $jsonEmpresa = $empresaClass->getEmpresa();
        echo $jsonEmpresa;
    }
} else {
    echo "No ingresado";
}

<?php

session_start();


if (isset($_SESSION["login"])) {


    require_once "../db/empresa.class.php";
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

    $userEmpresa = new Empresa();
    $userEmpresa->setId(escaparDatos($idEmpresa));
    $userEmpresa->setRazon_social(escaparDatos($razon_social));
    $userEmpresa->setNombre(escaparDatos($nombre));
    $userEmpresa->setApellido_paterno(escaparDatos($apellido_paterno));
    $userEmpresa->setApellido_paterno(escaparDatos($apellido_materno));
    $userEmpresa->setDireccion(escaparDatos($direccion));
    $userEmpresa->setTelefono(escaparDatos($telefono));
    $userEmpresa->setId_documento(escaparDatos($id_documento));
    $userEmpresa->setDocumento(escaparDatos($documento));
    $userEmpresa->setId_usuario_creador(escaparDatos($id_usuario_creador));

    /**VALIDACION PARA IMAGENES */
    $logoNombre = '';

    if ($logo["name"] != '') {
        if (!is_dir($carpetaImagenEmpresa)) {
            mkdir($carpetaImagenEmpresa);
        }
        // generando nombre unico
        $logoNombre = md5(uniqid(rand(), true)) . ".jpg";

        if ($logo != '') {
            move_uploaded_file($logo["tmp_name"], $carpetaImagenEmpresa . $logoNombre);
        }
    }


    $userEmpresa->setLogo($logoNombre);


    if (isset($_POST["save"])) {
        if ($respuesta["error"]) {
        } else {
            $userEmpresa->insertEmpresa();
            $respuesta["mensaje"] = "Guardado Correctamente";
            echo json_encode($respuesta);
        }
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

<?php



session_start();


if (isset($_SESSION["login"])) {


    require_once "../db/user.class.php";
    require_once("../db/Conexion.php");
    require "funciones.php";

    $carpetaImagenUser = "../img/avatar/";
    $errores = [
        "error" => false,
        "mensaje" => ""
    ];

    $idUsuario = isset($_POST["idUsuario"]) ? trim($_POST["idUsuario"]) : "";
    $nombre_usuario = isset($_POST["nombre_usuario"]) ? trim($_POST["nombre_usuario"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
    $nombres = isset($_POST["nombres"]) ? trim($_POST["nombres"]) : "";
    $apellido_paterno = isset($_POST["apellido_paterno"]) ? trim($_POST["apellido_paterno"]) : "";
    $apellido_materno = isset($_POST["apellido_materno"]) ? trim($_POST["apellido_materno"]) : "";
    $direccion = isset($_POST["direccion"]) ? trim($_POST["direccion"]) : "";
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
    $id_documento = isset($_POST["id_documento"]) ? trim($_POST["id_documento"]) : "";
    $documento = isset($_POST["documento"]) ? trim($_POST["documento"]) : "";
    $idrol = isset($_POST["idrol"]) ? trim($_POST["idrol"]) : "";
    $foto = isset($_FILES["fotoUser"]) ? $_FILES["fotoUser"] : "";

    $userClass = new User();
    $userClass->setId(escaparDatos($idUsuario));
    $userClass->setNombre_usuario(escaparDatos($nombre_usuario));
    $userClass->setPassword(password_hash($password, PASSWORD_BCRYPT));
    $userClass->setNombres(escaparDatos($nombres));
    $userClass->setApellido_paterno(escaparDatos($apellido_paterno));
    $userClass->setApellido_materno(escaparDatos($apellido_materno));
    $userClass->setDireccion(escaparDatos($direccion));
    $userClass->setTelefono(escaparDatos($telefono));
    $userClass->setIdDocumento(escaparDatos($id_documento));
    $userClass->setDocumento(escaparDatos($documento));
    $userClass->setIdRol(escaparDatos($idrol));

    /**VERIFICA SI USUARIO EXISTE */
    $existUser = existeDato("usuario", "nombre_usuario", $nombre_usuario);

    if ($existUser == '1') {
        $errores["error"] = true;
        $errores["mensaje"] = "El nombre de usuario ya existe";

        echo json_encode($errores);
        die;
    }

    /**VALIDACION PARA IMAGENES */
    $fotoNombre = '';
    if (isset($foto["name"])) {
        if ($foto["name"] != '') {
            if (!is_dir($carpetaImagenUser)) {
                mkdir($carpetaImagenUser);
            }
            // generando nombre unico
            $extension = explode(".", $foto["name"]);
            $extension = end($extension);
            $fotoNombre = md5(uniqid(rand(), true)) . "." . $extensions;

            if ($foto != '') {
                move_uploaded_file($foto["tmp_name"], $carpetaImagenUser . $fotoNombre);
            }
        }
    }


    $userClass->setFoto($fotoNombre);


    if (isset($_POST["save"])) {

        $userClass->insertUsuario();
        echo json_encode($errores);
    }

    if (isset($_POST["edit"])) {

        $userClass->updateUser();
    }

    if (isset($_POST["delete"])) {
        $userClass->deleteUser();
    }

    if (isset($_POST["consultar"])) {
        $jsonUser = $userClass->getUser();
        echo $jsonUser;
    }
} else {
    echo "No Ingreso";
}

<?php
require_once "../db/user.class.php";
require "funciones.php";

$carpetaImagenUser = "../img/avatar/";

$idUsuario = isset($_POST["idUsuario"]) ? $_POST["idUsuario"] : "";
$nombre_usuario = isset($_POST["nombre_usuario"]) ? $_POST["nombre_usuario"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$nombres = isset($_POST["nombres"]) ? $_POST["nombres"] : "";
$apellido_paterno = isset($_POST["apellido_paterno"]) ? $_POST["apellido_paterno"] : "";
$apellido_materno = isset($_POST["apellido_materno"]) ? $_POST["apellido_materno"] : "";
$direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
$id_documento = isset($_POST["id_documento"]) ? $_POST["id_documento"] : "";
$idrol = isset($_POST["idrol"]) ? $_POST["idrol"] : "";
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
$userClass->setIdRol(escaparDatos($idrol));

/**VALIDACION PARA IMAGENES */
$fotoNombre = '';
if ($foto["name"] != '') {
    if (!is_dir($carpetaImagenUser)) {
        mkdir($carpetaImagenUser);
    }
    // generando nombre unico
    $fotoNombre = md5(uniqid(rand(), true)) . ".jpg";

    if ($foto != '') {
        move_uploaded_file($foto["tmp_name"], $carpetaImagenUser . $fotoNombre);
    }
}

$userClass->setFoto($fotoNombre);


if (isset($_POST["save"])) {
    $userClass->insertUsuario();
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

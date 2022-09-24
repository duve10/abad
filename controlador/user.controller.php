<?php
require_once "../db/user.class.php";
require "funciones.php";

$userClass = new User();
$userClass->setId(escaparDatos($_POST["idUsuario"]));
$userClass->setNombre_usuario(escaparDatos($_POST["nombre_usuario"]));
$userClass->setPassword(escaparDatos($_POST["password"]));
$userClass->setNombres(escaparDatos($_POST["nombres"]));
$userClass->setApellido_paterno(escaparDatos($_POST["apellido_paterno"]));
$userClass->setApellido_materno(escaparDatos($_POST["apellido_materno"]));
$userClass->setDireccion(escaparDatos($_POST["direccion"]));
$userClass->setTelefono(escaparDatos($_POST["telefono"]));


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
    $userClass->getUser();
}

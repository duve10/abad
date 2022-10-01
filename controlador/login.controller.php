<?php 

require_once "db/login.class.php";
require "funciones.php";


function verifyUser($nombre_usuario,$password) {
    $loginClass = new Login();
    $loginClass->setNombre_usuario(escaparDatos($nombre_usuario));
    $loginClass->setPassword($password);
 
    return $loginClass->getUsuario();
}



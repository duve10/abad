<?php

require_once("dbConnect.php");

class Conexion
{
    public static function Conectar()
    {

        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            $conexion = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS, $opciones);
            return $conexion;
        } catch (Exception $e) {
            die("El error de Conexión es: " . $e->getMessage());
        }
    }
}

// $objeto = new Conexion();
// $conexion = $objeto->Conectar();

// var_dump($conexion);

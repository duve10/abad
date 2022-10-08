<?php
function escaparDatos($dato)
{
   return preg_replace('/[^a-zA-Z0-9 ]/', '', $dato);
}

function verificaSesion()
{
   if (session_status() === PHP_SESSION_NONE) {
      session_start();
   }
}


function autenticar()
{
   if (session_status() === PHP_SESSION_NONE) {
      session_start();
   }
   $auth = $_SESSION["login"] ?? false;
   if ($auth) {
      return true;
   }

   return false;
}


function existeDato($tabla, $dato, $user)
{
   $sql = "SELECT count(id) FROM $tabla where $dato = '$user'";
   $objeto = new Conexion();

   $conexion = $objeto->Conectar();
   $resultado = $conexion->prepare($sql);
   $resultado->execute();
   return ($resultado->fetchColumn());
}

function existeDatoUpdate($tabla, $dato, $info, $id)
{
   $sql = "SELECT count(id) FROM $tabla where $dato = '$info' and id != $id" ;
   $objeto = new Conexion();

   $conexion = $objeto->Conectar();
   $resultado = $conexion->prepare($sql);
   $resultado->execute();
   return ($resultado->fetchColumn());
}

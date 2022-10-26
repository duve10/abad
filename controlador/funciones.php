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

function extraeDato($columna, $tabla, $id, $idDato)
{
   $sql = "SELECT $columna FROM $tabla where $id = $idDato";
   $objeto = new Conexion();

   $conexion = $objeto->Conectar();
   $resultado = $conexion->prepare($sql);
   $resultado->execute();
   return ($resultado->fetchColumn());
}

function extraeDatos($columna, $tabla, $id, $idDato)
{
   $sql = "SELECT $columna FROM $tabla where $id = $idDato";
   $objeto = new Conexion();

   $conexion = $objeto->Conectar();
   $resultado = $conexion->prepare($sql);
   $resultado->execute();
   return ($resultado->fetch(PDO::FETCH_ASSOC));
}



function existeDatoPorTabla($tabla, $dato, $user, $id, $id2)
{
   $sql = "SELECT count(id) FROM $tabla where $dato = '$user' and $id = $id2";
   $objeto = new Conexion();

   $conexion = $objeto->Conectar();
   $resultado = $conexion->prepare($sql);
   $resultado->execute();
   return ($resultado->fetchColumn());
}

function existeDatoUpdate($tabla, $dato, $info, $id)
{
   $sql = "SELECT count(id) FROM $tabla where $dato = '$info' and id != $id";
   $objeto = new Conexion();

   $conexion = $objeto->Conectar();
   $resultado = $conexion->prepare($sql);
   $resultado->execute();
   return ($resultado->fetchColumn());
}

function existeDatoUpdatePorTabla($tabla, $dato, $info, $id, $idForaneo, $idForaneo2)
{
   $sql = "SELECT count(id) FROM $tabla where $dato = '$info' and id != $id and $idForaneo = $idForaneo2";
   $objeto = new Conexion();

   $conexion = $objeto->Conectar();
   $resultado = $conexion->prepare($sql);
   $resultado->execute();
   return ($resultado->fetchColumn());
}

function quitarAcentos($cadena)
{

   //Reemplazamos la A y a
   $cadena = str_replace(
      array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
      array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
      $cadena
   );

   //Reemplazamos la E y e
   $cadena = str_replace(
      array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
      array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
      $cadena
   );

   //Reemplazamos la I y i
   $cadena = str_replace(
      array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
      array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
      $cadena
   );

   //Reemplazamos la O y o
   $cadena = str_replace(
      array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
      array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
      $cadena
   );

   //Reemplazamos la U y u
   $cadena = str_replace(
      array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
      array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
      $cadena
   );

   //Reemplazamos la N, n, C y c
   $cadena = str_replace(
      array('Ñ', 'ñ', 'Ç', 'ç'),
      array('N', 'n', 'C', 'c'),
      $cadena
   );

   return $cadena;
}

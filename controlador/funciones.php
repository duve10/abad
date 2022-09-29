<?php
function escaparDatos($dato)
{
   return preg_replace('/[^a-zA-Z0-9 ]/', '', $dato);
}


function autenticar()
{
   session_start();
   $auth = $_SESSION["login"] ?? false;
   if ($auth) {
      return true;
   }

   return false;
}

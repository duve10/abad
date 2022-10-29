<?php

require_once "../db/calificacion.class.php";

if(isset($_GET)){
    $calificaciones = [];
    $json = new Calificacion();
    $calificaciones = $json->getCalificacionesApi();
    echo $calificaciones;
}


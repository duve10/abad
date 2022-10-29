<?php

require_once "../db/propiedad.class.php";

if(isset($_GET)){
    $propiedades = [];
    $json = new Propiedad();
    $propiedades = $json->getPropiedadesApi();
    echo $propiedades;
}


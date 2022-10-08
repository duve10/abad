<?php
require_once "db/propiedad.class.php";



function getPropiedades($iduser,$idrol)
{
    $data = new Propiedad();
    $propiedades = $data->getPropiedades($iduser,$idrol);
    return $propiedades;
}

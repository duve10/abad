<?php
require_once "db/nivel1.class.php";



function getNiveles1($iduser,$idrol)
{
    $data = new Nivel1();
    $niveles1 = $data->getNivel1($iduser,$idrol);
    return $niveles1;
}

<?php
require_once "db/user.class.php";

function getUsuarios()
{
    $data = new User();
    $usuarios = $data->getUsuarios();
    return $usuarios;
}

<?php

require_once("Conexion.php");

class Login
{
    private $id;
    private $nombre_usuario;
    private $password;


    public function __construct($id = 0, $nombre_usuario = '', $password = '')
    {
        $this->id = $id;
        $this->nombre_usuario = $nombre_usuario;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    public function setNombre_usuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }



    public function getUsuario()
    {
        $sql = "SELECT * FROM usuario where nombre_usuario = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->nombre_usuario]);
        return ($resultado->fetch(PDO::FETCH_ASSOC));
    }

}

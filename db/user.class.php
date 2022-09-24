<?php

require_once("Conexion.php");

class User 
{
    private $id;
    private $nombre_usuario;
    private $password;
    private $nombres;
    private $apellido_paterno;
    private $apellido_materno;
    private $direccion;
    private $telefono;

    public function __construct($id = 0, $nombre_usuario = '', $password = '', $nombres = '', $apellido_paterno = '', $apellido_materno = '', $direccion = '', $telefono = '')
    {
        $this->id = $id;
        $this->nombre_usuario = $nombre_usuario;
        $this->password = $password;
        $this->nombres = $nombres;
        $this->apellido_paterno = $apellido_paterno;
        $this->apellido_materno = $apellido_materno;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
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

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getApellido_paterno()
    {
        return $this->apellido_paterno;
    }

    public function setApellido_paterno($apellido_paterno)
    {
        $this->apellido_paterno = $apellido_paterno;

        return $this;
    }

    public function getApellido_materno()
    {
        return $this->apellido_materno;
    }

    public function setApellido_materno($apellido_materno)
    {
        $this->apellido_materno = $apellido_materno;

        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }


    public function insertUsuario()
    {
        try {
            $sql = "INSERT INTO USUARIO(nombre_usuario,password,nombres,apellido_paterno,apellido_materno,direccion,telefono,id_documento,idrol) VALUES (?,?,?,?,?,?,?,1,1)";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([$this->nombre_usuario,$this->password,$this->nombres,$this->apellido_paterno,$this->apellido_materno,$this->direccion,$this->telefono]); 
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
     
        
    }

    public function getUsuarios() {
        $sql = "SELECT * FROM usuario ORDER BY ID DESC";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute(); 
        return $resultado->fetchAll();
    }

    public function getUser() {
        $sql = "SELECT * FROM usuario where id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]); 
        return $resultado->fetchAll();
    }

    public function updateUser() {
        $sql = "UPDATE  USUARIO SET nombre_usuario = ?,password = ?,nombres = ?,apellido_paterno = ?,apellido_materno = ?,direccion = ?,telefono = ? WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->nombre_usuario,$this->password,$this->nombres,$this->password,$this->apellido_paterno,$this->apellido_materno,$this->direccion,$this->telefono, $this->id]); 
    }

    public function deleteUser() {
        $sql = "DELETE FROM usuario WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]); 
        return $resultado->fetchAll();
    }
}

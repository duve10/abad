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
    private $idDocumento;
    private $documento;
    private $idRol;
    private $foto;
    
    public function __construct($id = 0, $nombre_usuario = '', $password = '', $nombres = '', $apellido_paterno = '', $apellido_materno = '', $direccion = '', $telefono = '', $idDocumento = '', $documento= '', $idRol= '', $foto= '')
    { 
        $this->id = $id;
        $this->nombre_usuario = $nombre_usuario;
        $this->password = $password;
        $this->nombres = $nombres;
        $this->apellido_paterno = $apellido_paterno;
        $this->apellido_materno = $apellido_materno;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->idDocumento = $idDocumento;
        $this->documento = $documento;
        $this->idRol = $idRol;
        $this->foto = $foto;
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

    public function getIdDocumento()
    {
        return $this->idDocumento;
    }
 
    public function setIdDocumento($idDocumento)
    {
        $this->idDocumento = $idDocumento;

        return $this;
    }

    public function getDocumento()
    {
        return $this->documento;
    }
 
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    public function getIdRol()
    {
        return $this->idRol;
    }

    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    public function insertUsuario()
    {
        try {
            $sql = "INSERT INTO usuario(nombre_usuario,password,nombres,apellido_paterno,apellido_materno,direccion,telefono,id_documento,documento,idrol, foto, estado, fecha_creacion) VALUES (?,?,?,?,?,?,?,?,?,?,?,1, now())";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([$this->nombre_usuario,$this->password,$this->nombres,$this->apellido_paterno,$this->apellido_materno,$this->direccion,$this->telefono,$this->idDocumento,$this->documento,$this->idRol,$this->foto]); 
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
     

    }

    public function getUsuarios() {
        $sql = "SELECT u.id,u.nombre_usuario,u.nombres,u.apellido_paterno,u.apellido_materno,u.foto,r.descripcion  FROM usuario as u left join rol as r on u.idrol = r.id where u.estado = 1 and u.idrol!= 3  ORDER BY u.ID DESC";
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
        return json_encode(($resultado->fetch(PDO::FETCH_ASSOC)));
    }

    public function updateUser() {
        $sql = "UPDATE  usuario SET password = ?,nombres = ?,apellido_paterno = ?,apellido_materno = ?,direccion = ?,telefono = ?,documento = ?,id_documento=?, idrol=? WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->password,$this->nombres,$this->apellido_paterno,$this->apellido_materno,$this->direccion,$this->telefono, $this->documento, $this->idDocumento, $this->idRol, $this->id]); 
    }

    public function deleteUser() {
        $sql = "UPDATE usuario SET estado = 0 WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]); 
        return $resultado->fetchAll();
    }


}

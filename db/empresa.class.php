<?php

require_once("Conexion.php");

class Empresa
{
    private $id;
    private $razon_social;
    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $direccion;
    private $telefono;
    private $documento;
    private $id_documento;
    private $id_usuario_creador;
    private $logo;



    public function __construct($id = 0, $razon_social = '', $nombre = '', $apellido_paterno = '', $apellido_materno = '', $direccion = '', $telefono = '', $documento = '', $id_documento = '', $id_usuario_creador = '', $logo = '')
    {
        $this->id = $id;
        $this->razon_social = $razon_social;
        $this->nombre = $nombre;
        $this->apellido_paterno = $apellido_paterno;
        $this->apellido_materno = $apellido_materno;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->documento = $documento;
        $this->id_documento = $id_documento;
        $this->id_usuario_creador = $id_usuario_creador;
        $this->logo = $logo;
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

    
    public function getRazon_social()
    {
        return $this->razon_social;
    }

    public function setRazon_social($razon_social)
    {
        $this->razon_social = $razon_social;

        return $this;
    }


    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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

    public function getDocumento()
    {
        return $this->documento;
    }

    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    public function getId_documento()
    {
        return $this->id_documento;
    }

    public function setId_documento($id_documento)
    {
        $this->id_documento = $id_documento;

        return $this;
    }

    public function getId_usuario_creador()
    {
        return $this->id_usuario_creador;
    }

    public function setId_usuario_creador($id_usuario_creador)
    {
        $this->id_usuario_creador = $id_usuario_creador;

        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    public function insertEmpresa()
    {
        try {
            $sql = "INSERT INTO EMPRESA(razon_social,nombre,apellido_paterno,apellido_materno,direccion,telefono,documento,id_documento,id_usuario_creador, logo) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([$this->razon_social,$this->nombre,$this->apellido_paterno,$this->apellido_materno,$this->direccion,$this->telefono, $this->documento, $this->id_documento, $this->id_usuario_creador, $this->logo]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getEmpresas()
    {
        $sql = "SELECT e.id,e.nombre as empresa,e.documento as numero_doc,u.nombre_usuario,d.descripcion as tipo_doc,e.razon_social,e.apellido_paterno,e.apellido_materno,e.direccion,e.telefono,e.logo FROM empresa as e 
        left join usuario as u on u.id = e.id_usuario_creador
        left join documento as d on d.id=e.id_documento ORDER BY e.ID DESC";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        return $resultado->fetchAll();
    }

    public function getEmpresa()
    {
        $sql = "SELECT * FROM empresa where id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return json_encode(($resultado->fetch(PDO::FETCH_ASSOC)));
    }

    public function updateEmpresa()
    {
        $sql = "UPDATE  empresa SET nombre = ?,documento = ?,id_documento = ? WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->nombre, $this->documento, $this->id_documento, $this->id]);
    }

    public function deleteEmpresa()
    {
        $sql = "DELETE FROM empresa WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return $resultado->fetchAll();
    }


}

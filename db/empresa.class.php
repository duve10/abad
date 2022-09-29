<?php

require_once("Conexion.php");

class Empresa
{
    private $id;
    private $nombre;
    private $documento;
    private $id_documento;
    private $id_usuario_creador;

    public function __construct($id = 0, $nombre = '', $documento = '', $id_documento = '', $id_usuario_creador = '')
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->documento = $documento;
        $this->id_documento = $id_documento;
        $this->id_usuario_creador = $id_usuario_creador;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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

    public function insertEmpresa()
    {
        try {
            $sql = "INSERT INTO EMPRESA(nombre,documento,id_documento,id_usuario_creador) VALUES (?,?,?,?)";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([$this->nombre, $this->documento, $this->id_documento, $this->id_usuario_creador]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getEmpresas()
    {
        $sql = "SELECT e.id,e.nombre as empresa,e.documento as numero_doc,u.nombre_usuario,d.descripcion as tipo_doc FROM `empresa` as e 
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

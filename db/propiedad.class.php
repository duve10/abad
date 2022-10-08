<?php

require_once("Conexion.php");

class Propiedad
{
    private $id;
    private $descripcion;
    private $id_usuario_creador;


    public function __construct($id = 0, $descripcion = '', $id_usuario_creador = '')
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
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


    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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

    public function insertPropiedad()
    {
        try {
            $sql = "INSERT INTO calificacion (descripcion,id_usuario_creador,fecha_creacion,estado) VALUES (?,?,now(),1)";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([$this->descripcion, $this->id_usuario_creador]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getPropiedades($idUser, $idRol)
    {
        $where = '';
        if ($idRol == '2') {
            $where = ' and n.id_usuario_creador =' . $idUser;
        }
        $sql = "SELECT  @i := @i + 1 as contador,n.id,n.descripcion,u.nombre_usuario FROM calificacion as n
        cross join (select @i := 0) r
        left join usuario as u on u.id = n.id_usuario_creador
        where n.estado=1 $where 
        ORDER BY n.descripcion";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        return $resultado->fetchAll();
    }

    public function getPropiedad()
    {
        $sql = "SELECT * FROM calificacion where id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return json_encode(($resultado->fetch(PDO::FETCH_ASSOC)));
    }

    public function updatePropiedad()
    {
        $sql = "UPDATE  calificacion SET  descripcion=? WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->descripcion, $this->id]);
    }

    public function deletePropiedad()
    {
        $sql = "UPDATE calificacion SET estado = 0 WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return $resultado->fetchAll();
    }
}

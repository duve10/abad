<?php

require_once("Conexion.php");

class Nivel1
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

    public function inserNivel1()
    {
        try {
            $sql = "INSERT INTO nivel1 (descripcion,id_usuario_creador,fecha_creacion,estado) VALUES (?,?,now(),1)";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([$this->descripcion, $this->id_usuario_creador]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getNivel1($idUser, $idRol)
    {
        $where = '';
        if ($idRol == '2') {
            $where = ' where n.id_usuario_creador =' . $idUser;
        }
        $sql = "SELECT  @i := @i + 1 as contador,n.id,n.descripcion,u.nombre_usuario FROM nivel1 as n
        cross join (select @i := 0) r
        left join usuario as u on u.id = n.id_usuario_creador
        $where 
        ORDER BY n.ID DESC";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        return $resultado->fetchAll();
    }

    public function getNivel1_1()
    {
        $sql = "SELECT * FROM nivel1 where id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return json_encode(($resultado->fetch(PDO::FETCH_ASSOC)));
    }

    public function updateNivel1()
    {
        $sql = "UPDATE  nivel1 SET  descripcion=? WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->descripcion, $this->id]);
    }

    public function deleteNivel1()
    {
        $sql = "UPDATE nivel1 SET estado = 0 WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return $resultado->fetchAll();
    }
}

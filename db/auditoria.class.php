<?php

require_once("Conexion.php");

class Auditoria
{
    private $id;
    private $id_empresa;
    private $id_usuario_creador;


    public function __construct($id = 0, $id_empresa = '', $id_usuario_creador = '')
    {
        $this->id = $id;
        $this->id_empresa = $id_empresa;
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


    public function getId_empresa()
    {
        return $this->id_empresa;
    }

    public function setId_empresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;

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

    public function insertAuditoria()
    {
        try {
            $sql = "INSERT INTO auditoria (id_empresa,id_usuario_creador,fecha_creacion,estado) VALUES (?,?,now(),1)";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([$this->id_empresa, $this->id_usuario_creador]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAuditorias($idUser, $idRol)
    {
        $where = '';
        if ($idRol == '2') {
            $where = ' and n.id_usuario_creador =' . $idUser;
        }
        $sql = "SELECT  @i := @i + 1 as contador,n.id,n.id_empresa,u.nombre_usuario,e.razon_social,e.nombre,e.apellido_paterno,e.apellido_materno,e.documento
                 FROM auditoria as n
        cross join (select @i := 0) r
        left join usuario as u on u.id = n.id_usuario_creador
        left join empresa as e on e.id = n.id_empresa
        where n.estado=1 $where 
        ORDER BY n.id desc";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        return $resultado->fetchAll();
    }

    public function getAuditoria()
    {
        $sql = "SELECT * FROM auditoria where id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return json_encode(($resultado->fetch(PDO::FETCH_ASSOC)));
    }

    public function updateAuditoria()
    {
        $sql = "UPDATE  auditoria SET  descripcion=? WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->descripcion, $this->id]);
    }

    public function deleteAuditoria()
    {
        $sql = "UPDATE auditoria SET estado = 0 WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return $resultado->fetchAll();
    }
}

<?php

require_once("Conexion.php");

class Ciclo
{
    private $id;
    private $descripcion;
    private $id_usuario_creador;
    private $id_proceso;


    public function __construct($id = 0, $descripcion = '', $id_usuario_creador = '', $id_proceso = '')
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->id_usuario_creador = $id_usuario_creador;
        $this->id_proceso = $id_proceso;
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

    public function getId_proceso()
    {
        return $this->id_proceso;
    }

    public function setId_proceso($id_proceso)
    {
        $this->id_proceso = $id_proceso;

        return $this;
    }


    public function insertCiclo()
    {
        try {
            $sql = "INSERT INTO ciclo (descripcion,id_usuario_creador,fecha_creacion,estado,id_proceso) VALUES (?,?,now(),1,?)";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([$this->descripcion, $this->id_usuario_creador, $this->id_proceso]);
            return ["idProceso" => $this->id_proceso, "descripcion" => $this->descripcion];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getCiclos($idUser, $idRol, $id_proceso)
    {
        $where = '';
        if ($idRol == '2') {
            $where = ' and n.id_usuario_creador =' . $idUser;
        }
        $sql = "SELECT  @i := @i + 1 as contador,n.id,n.descripcion,u.nombre_usuario,n.id_proceso FROM ciclo as n
        cross join (select @i := 0) r
        left join usuario as u on u.id = n.id_usuario_creador
        where n.estado=1 and n.id_proceso=$id_proceso $where 
        ORDER BY n.descripcion";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        return $resultado->fetchAll();
    }

    public function getCiclo()
    {
        $sql = "SELECT * FROM ciclo where id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return json_encode(($resultado->fetch(PDO::FETCH_ASSOC)));
    }

    public function updateCiclo()
    {
        $sql = "UPDATE  ciclo SET  descripcion=? WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->descripcion, $this->id]);
    }

    public function deleteCiclo()
    {
        $sql = "UPDATE ciclo SET estado = 0 WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return $resultado->fetchAll();
    }
}

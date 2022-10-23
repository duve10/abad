<?php

require_once("Conexion.php");

class Transaccion
{
    private $id;
    private $descripcion;
    private $id_usuario_creador;
    private $id_ciclo;


    public function __construct($id = 0, $descripcion = '', $id_usuario_creador = '', $id_ciclo = '')
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->id_usuario_creador = $id_usuario_creador;
        $this->id_ciclo = $id_ciclo;
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

    public function getId_ciclo()
    {
        return $this->id_ciclo;
    }

    public function setId_ciclo($id_ciclo)
    {
        $this->id_ciclo = $id_ciclo;

        return $this;
    }


    public function insertTransaccion()
    {
        try {
            $sql = "INSERT INTO transaccion (descripcion,id_usuario_creador,fecha_creacion,estado,id_ciclo) VALUES (?,?,now(),1,?)";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([$this->descripcion, $this->id_usuario_creador, $this->id_ciclo]);
            return ["idCiclo" => $this->id_ciclo, "descripcion" => $this->descripcion];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTransacciones($idUser, $idRol, $id_ciclo)
    {
        $where = '';
        if ($idRol == '2') {
            $where = ' and n.id_usuario_creador =' . $idUser;
        }
        $sql = "SELECT  @i := @i + 1 as contador,n.id,n.descripcion,u.nombre_usuario,n.id_ciclo FROM transaccion as n
        cross join (select @i := 0) r
        left join usuario as u on u.id = n.id_usuario_creador
        where n.estado=1 and n.id_ciclo=$id_ciclo $where 
        ORDER BY n.descripcion";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        return $resultado->fetchAll();
    }

    public function getTransaccion()
    {
        $sql = "SELECT * FROM transaccion where id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return json_encode(($resultado->fetch(PDO::FETCH_ASSOC)));
    }

    public function updateTransaccion()
    {
        $sql = "UPDATE  transaccion SET  descripcion=? WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->descripcion, $this->id]);
    }

    public function deleteTransaccion()
    {
        $sql = "UPDATE transaccion SET estado = 0 WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return $resultado->fetchAll();
    }
}

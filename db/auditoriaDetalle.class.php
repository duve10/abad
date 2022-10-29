<?php

require_once("Conexion.php");

class AuditoriaDetalle
{

    private $id;
    private $objetivo;
    private $id_propiedad;
    private $id_proceso;
    private $id_ciclo;
    private $id_transaccion;
    private $id_usuario_creador;
    private $id_calificacion;
    private $id_componente1;
    private $id_componente2;
    private $id_componente3;
    private $id_componente4;
    private $rieso;
    private $actividad1;
    private $actividad2;
    private $asercion1;
    private $asercion2;
    private $asercion3;
    private $sox_ci;
    private $sox_ai;
    private $prioridad_ci;
    private $prioridad_ai;
    private $act_ctrl;
    private $periodo_cubierto;
    private $existencia;
    private $revelacion;
    private $valuacion;
    private $derechos;
    private $integridad;
    private $diseno1;
    private $diseno2;
    private $id_auditoria;


    public function __construct($id = 0, $objetivo = '', $id_propiedad = 0, $id_proceso = 0, $id_ciclo = 0, $id_transaccion = 0, $id_usuario_creador = 0, $id_calificacion = 0, $id_componente1 = 0, $id_componente2 = 0, $id_componente3 = 0, $id_componente4 = 0, $rieso = '', $actividad1 = '', $actividad2 = '', $asercion1 = '', $asercion2 = '', $asercion3 = '', $sox_ci = '', $sox_ai = '', $prioridad_ci = '', $prioridad_ai = '', $act_ctrl = '', $periodo_cubierto = '', $existencia = '', $revelacion = '', $valuacion = '', $derechos = '', $integridad = '', $diseno1 = '', $diseno2 = '', $id_auditoria = 0)
    {
        $this->id = $id;
        $this->objetivo = $objetivo;
        $this->id_propiedad = $id_propiedad;
        $this->id_proceso = $id_proceso;
        $this->id_ciclo = $id_ciclo;
        $this->id_transaccion = $id_transaccion;
        $this->id_usuario_creador = $id_usuario_creador;
        $this->id_calificacion = $id_calificacion;
        $this->id_componente1 = $id_componente1;
        $this->id_componente2 = $id_componente2;
        $this->id_componente3 = $id_componente3;
        $this->id_componente4 = $id_componente4;
        $this->rieso = $rieso;
        $this->actividad1 = $actividad1;
        $this->actividad2 = $actividad2;
        $this->asercion1 = $asercion1;
        $this->asercion2 = $asercion2;
        $this->asercion3 = $asercion3;
        $this->sox_ci = $sox_ci;
        $this->sox_ai = $sox_ai;
        $this->prioridad_ci = $prioridad_ci;
        $this->prioridad_ai = $prioridad_ai;
        $this->act_ctrl = $act_ctrl;
        $this->periodo_cubierto = $periodo_cubierto;
        $this->existencia = $existencia;
        $this->revelacion = $revelacion;
        $this->valuacion = $valuacion;
        $this->derechos = $derechos;
        $this->integridad = $integridad;
        $this->diseno1 = $diseno1;
        $this->diseno2 = $diseno2;
        $this->id_auditoria = $id_auditoria;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of objetivo
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set the value of objetivo
     *
     * @return  self
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get the value of id_propiedad
     */
    public function getId_propiedad()
    {
        return $this->id_propiedad;
    }

    /**
     * Set the value of id_propiedad
     *
     * @return  self
     */
    public function setId_propiedad($id_propiedad)
    {
        $this->id_propiedad = $id_propiedad;

        return $this;
    }

    /**
     * Get the value of id_proceso
     */
    public function getId_proceso()
    {
        return $this->id_proceso;
    }

    /**
     * Set the value of id_proceso
     *
     * @return  self
     */
    public function setId_proceso($id_proceso)
    {
        $this->id_proceso = $id_proceso;

        return $this;
    }

    /**
     * Get the value of id_ciclo
     */
    public function getId_ciclo()
    {
        return $this->id_ciclo;
    }

    /**
     * Set the value of id_ciclo
     *
     * @return  self
     */
    public function setId_ciclo($id_ciclo)
    {
        $this->id_ciclo = $id_ciclo;

        return $this;
    }

    /**
     * Get the value of id_transaccion
     */
    public function getId_transaccion()
    {
        return $this->id_transaccion;
    }

    /**
     * Set the value of id_transaccion
     *
     * @return  self
     */
    public function setId_transaccion($id_transaccion)
    {
        $this->id_transaccion = $id_transaccion;

        return $this;
    }

    /**
     * Get the value of id_usuario_creador
     */
    public function getId_usuario_creador()
    {
        return $this->id_usuario_creador;
    }

    /**
     * Set the value of id_usuario_creador
     *
     * @return  self
     */
    public function setId_usuario_creador($id_usuario_creador)
    {
        $this->id_usuario_creador = $id_usuario_creador;

        return $this;
    }

    /**
     * Get the value of id_calificacion
     */
    public function getId_calificacion()
    {
        return $this->id_calificacion;
    }

    /**
     * Set the value of id_calificacion
     *
     * @return  self
     */
    public function setId_calificacion($id_calificacion)
    {
        $this->id_calificacion = $id_calificacion;

        return $this;
    }

    /**
     * Get the value of id_componente1
     */
    public function getId_componente1()
    {
        return $this->id_componente1;
    }

    /**
     * Set the value of id_componente1
     *
     * @return  self
     */
    public function setId_componente1($id_componente1)
    {
        $this->id_componente1 = $id_componente1;

        return $this;
    }

    /**
     * Get the value of id_componente2
     */
    public function getId_componente2()
    {
        return $this->id_componente2;
    }

    /**
     * Set the value of id_componente2
     *
     * @return  self
     */
    public function setId_componente2($id_componente2)
    {
        $this->id_componente2 = $id_componente2;

        return $this;
    }

    /**
     * Get the value of id_componente3
     */
    public function getId_componente3()
    {
        return $this->id_componente3;
    }

    /**
     * Set the value of id_componente3
     *
     * @return  self
     */
    public function setId_componente3($id_componente3)
    {
        $this->id_componente3 = $id_componente3;

        return $this;
    }

    /**
     * Get the value of id_componente4
     */
    public function getId_componente4()
    {
        return $this->id_componente4;
    }

    /**
     * Set the value of id_componente4
     *
     * @return  self
     */
    public function setId_componente4($id_componente4)
    {
        $this->id_componente4 = $id_componente4;

        return $this;
    }

    /**
     * Get the value of rieso
     */
    public function getRieso()
    {
        return $this->rieso;
    }

    /**
     * Set the value of rieso
     *
     * @return  self
     */
    public function setRieso($rieso)
    {
        $this->rieso = $rieso;

        return $this;
    }

    /**
     * Get the value of actividad1
     */
    public function getActividad1()
    {
        return $this->actividad1;
    }

    /**
     * Set the value of actividad1
     *
     * @return  self
     */
    public function setActividad1($actividad1)
    {
        $this->actividad1 = $actividad1;

        return $this;
    }

    /**
     * Get the value of actividad2
     */
    public function getActividad2()
    {
        return $this->actividad2;
    }

    /**
     * Set the value of actividad2
     *
     * @return  self
     */
    public function setActividad2($actividad2)
    {
        $this->actividad2 = $actividad2;

        return $this;
    }

    /**
     * Get the value of asercion1
     */
    public function getAsercion1()
    {
        return $this->asercion1;
    }

    /**
     * Set the value of asercion1
     *
     * @return  self
     */
    public function setAsercion1($asercion1)
    {
        $this->asercion1 = $asercion1;

        return $this;
    }

    /**
     * Get the value of asercion2
     */
    public function getAsercion2()
    {
        return $this->asercion2;
    }

    /**
     * Set the value of asercion2
     *
     * @return  self
     */
    public function setAsercion2($asercion2)
    {
        $this->asercion2 = $asercion2;

        return $this;
    }

    /**
     * Get the value of asercion3
     */
    public function getAsercion3()
    {
        return $this->asercion3;
    }

    /**
     * Set the value of asercion3
     *
     * @return  self
     */
    public function setAsercion3($asercion3)
    {
        $this->asercion3 = $asercion3;

        return $this;
    }

    /**
     * Get the value of sox_ci
     */
    public function getSox_ci()
    {
        return $this->sox_ci;
    }

    /**
     * Set the value of sox_ci
     *
     * @return  self
     */
    public function setSox_ci($sox_ci)
    {
        $this->sox_ci = $sox_ci;

        return $this;
    }

    /**
     * Get the value of sox_ai
     */
    public function getSox_ai()
    {
        return $this->sox_ai;
    }

    /**
     * Set the value of sox_ai
     *
     * @return  self
     */
    public function setSox_ai($sox_ai)
    {
        $this->sox_ai = $sox_ai;

        return $this;
    }

    /**
     * Get the value of prioridad_ci
     */
    public function getPrioridad_ci()
    {
        return $this->prioridad_ci;
    }

    /**
     * Set the value of prioridad_ci
     *
     * @return  self
     */
    public function setPrioridad_ci($prioridad_ci)
    {
        $this->prioridad_ci = $prioridad_ci;

        return $this;
    }

    /**
     * Get the value of prioridad_ai
     */
    public function getPrioridad_ai()
    {
        return $this->prioridad_ai;
    }

    /**
     * Set the value of prioridad_ai
     *
     * @return  self
     */
    public function setPrioridad_ai($prioridad_ai)
    {
        $this->prioridad_ai = $prioridad_ai;

        return $this;
    }

    /**
     * Get the value of act_ctrl
     */
    public function getAct_ctrl()
    {
        return $this->act_ctrl;
    }

    /**
     * Set the value of act_ctrl
     *
     * @return  self
     */
    public function setAct_ctrl($act_ctrl)
    {
        $this->act_ctrl = $act_ctrl;

        return $this;
    }

    /**
     * Get the value of periodo_cubierto
     */
    public function getPeriodo_cubierto()
    {
        return $this->periodo_cubierto;
    }

    /**
     * Set the value of periodo_cubierto
     *
     * @return  self
     */
    public function setPeriodo_cubierto($periodo_cubierto)
    {
        $this->periodo_cubierto = $periodo_cubierto;

        return $this;
    }

    /**
     * Get the value of existencia
     */
    public function getExistencia()
    {
        return $this->existencia;
    }

    /**
     * Set the value of existencia
     *
     * @return  self
     */
    public function setExistencia($existencia)
    {
        $this->existencia = $existencia;

        return $this;
    }

    /**
     * Get the value of revelacion
     */
    public function getRevelacion()
    {
        return $this->revelacion;
    }

    /**
     * Set the value of revelacion
     *
     * @return  self
     */
    public function setRevelacion($revelacion)
    {
        $this->revelacion = $revelacion;

        return $this;
    }

    /**
     * Get the value of valuacion
     */
    public function getValuacion()
    {
        return $this->valuacion;
    }

    /**
     * Set the value of valuacion
     *
     * @return  self
     */
    public function setValuacion($valuacion)
    {
        $this->valuacion = $valuacion;

        return $this;
    }

    /**
     * Get the value of derechos
     */
    public function getDerechos()
    {
        return $this->derechos;
    }

    /**
     * Set the value of derechos
     *
     * @return  self
     */
    public function setDerechos($derechos)
    {
        $this->derechos = $derechos;

        return $this;
    }

    /**
     * Get the value of integridad
     */
    public function getIntegridad()
    {
        return $this->integridad;
    }

    /**
     * Set the value of integridad
     *
     * @return  self
     */
    public function setIntegridad($integridad)
    {
        $this->integridad = $integridad;

        return $this;
    }

    /**
     * Get the value of diseno1
     */
    public function getDiseno1()
    {
        return $this->diseno1;
    }

    /**
     * Set the value of diseno1
     *
     * @return  self
     */
    public function setDiseno1($diseno1)
    {
        $this->diseno1 = $diseno1;

        return $this;
    }

    /**
     * Get the value of diseno2
     */
    public function getDiseno2()
    {
        return $this->diseno2;
    }

    /**
     * Set the value of diseno2
     *
     * @return  self
     */
    public function setDiseno2($diseno2)
    {
        $this->diseno2 = $diseno2;

        return $this;
    }

    /**
     * Get the value of id_auditoria
     */
    public function getId_auditoria()
    {
        return $this->id_auditoria;
    }

    /**
     * Set the value of id_auditoria
     *
     * @return  self
     */
    public function setId_auditoria($id_auditoria)
    {
        $this->id_auditoria = $id_auditoria;

        return $this;
    }


    public function insertDetalleAuditoria()
    {
        try {
            $sql = "INSERT INTO auditoria_detalle (
                objetivo,
                id_propiedad,
                id_proceso,
                id_ciclo,
                id_transaccion,
                id_usuario_creador,
                id_calificacion,
                id_componente1,
                id_componente2,
                id_componente3,
                id_componente4,
                rieso,
                actividad1,
                actividad2,
                asercion1,
                asercion2,
                asercion3,
                sox_ci,
                sox_ai,
                prioridad_ci,
                prioridad_ai,
                act_ctrl,
                periodo_cubierto,
                existencia,
                revelacion,
                valuacion,
                derechos,
                integridad,
                diseno1,
                diseno2,
                id_auditoria,
                id_usuario_creador,
                fecha_creacion,
                estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now(),1)";
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $resultado = $conexion->prepare($sql);
            $resultado->execute([

                $this->objetivo,
                $this->id_propiedad,
                $this->id_proceso,
                $this->id_ciclo,
                $this->id_transaccion,
                $this->id_usuario_creador,
                $this->id_calificacion,
                $this->id_componente1,
                $this->id_componente2,
                $this->id_componente3,
                $this->id_componente4,
                $this->rieso,
                $this->actividad1,
                $this->actividad2,
                $this->asercion1,
                $this->asercion2,
                $this->asercion3,
                $this->sox_ci,
                $this->sox_ai,
                $this->prioridad_ci,
                $this->prioridad_ai,
                $this->act_ctrl,
                $this->periodo_cubierto,
                $this->existencia,
                $this->revelacion,
                $this->valuacion,
                $this->derechos,
                $this->integridad,
                $this->diseno1,
                $this->diseno2,
                $this->id_auditoria

            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAuditoriaDetalles($idUser, $idRol, $id_auditoria)
    {
        $where = '';
        if ($idRol == '2') {
            $where = ' and n.id_usuario_creador =' . $idUser;
        }
        $sql = "SELECT  @i := @i + 1 as contador,t1.id,t2.nombre_usuario,t3.descripcion as propiedad,t4.descripcion as proceso,t5.descripcion as ciclo, t6.descripcion as transaccion, t7.descripcion as calificacion, t1.fecha_creacion
        FROM auditoria_detalle as t1
        cross join (select @i := 0) r
        left join usuario as t2 on t2.id = t1.id_usuario_creador
        left join propiedad t3 on t3.id = t1.id_propiedad
        left join proceso t4 on t4.id = t1.id_proceso
        left join ciclo t5 on t5.id = t1.id_ciclo
        left join transaccion t6  on t6.id = t1.id_transaccion
        left join calificacion t7 on t7.id = t1.id_calificacion
        where t1.estado=1 and t1.id_auditoria = $id_auditoria $where 
        ORDER BY t1.id desc";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        return $resultado->fetchAll();
    }

    public function getAuditoriaDetalle()
    {
        $sql = "SELECT * FROM auditoria_detalle where id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return json_encode(($resultado->fetch(PDO::FETCH_ASSOC)));
    }

    public function updateAuditoriaDetalle()
    {
        $sql = "UPDATE  auditoria SET  descripcion=? WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->descripcion, $this->id]);
    }

    public function deleteAuditoriaDetalle()
    {
        $sql = "UPDATE auditoria_detalle SET estado = 0 WHERE id = ?";
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $resultado = $conexion->prepare($sql);
        $resultado->execute([$this->id]);
        return $resultado->fetchAll();
    }
}

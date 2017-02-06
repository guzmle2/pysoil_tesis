<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 06:26 PM
 */

include_once 'EntidadBase.php';
class Orden extends EntidadBase {


    private $creador;
    private $plomero;
    private $llave;
    private $medidor;
    private $medidorRetirado;
    private $nic;
    private $osCorte;
    private $lecturaInicial;
    private $estatus;
    private $fechaCorte;
    private $estado;
    private $osReconexion;
    private $lecturaFinal;
    private $fechaReconexion;
    private $observacion;
    private $piezaRetirada;
    private $tipoOs;
    private $fechaResolucion;
    private $materiales;
    private $fechaCreacion;
    private $tipoServicio;
    private $extra;

    /**
     * @return mixed
     */
    public function getCreador()
    {
        return $this->creador;
    }

    /**
     * @param mixed $creador
     */
    public function setCreador($creador)
    {
        $this->creador = $creador;
    }

    /**
     * @return mixed
     */
    public function getPlomero()
    {
        return $this->plomero;
    }

    /**
     * @param mixed $plomero
     */
    public function setPlomero($plomero)
    {
        $this->plomero = $plomero;
    }

    /**
     * @return mixed
     */
    public function getLlave()
    {
        return $this->llave;
    }

    /**
     * @param mixed $llave
     */
    public function setLlave($llave)
    {
        $this->llave = $llave;
    }

    /**
     * @return mixed
     */
    public function getMedidor()
    {
        return $this->medidor;
    }

    /**
     * @param mixed $medidor
     */
    public function setMedidor($medidor)
    {
        $this->medidor = $medidor;
    }

    /**
     * @return mixed
     */
    public function getMedidorRetirado()
    {
        return $this->medidorRetirado;
    }

    /**
     * @param mixed $medidorRetirado
     */
    public function setMedidorRetirado($medidorRetirado)
    {
        $this->medidorRetirado = $medidorRetirado;
    }

    /**
     * @return mixed
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * @param mixed $nic
     */
    public function setNic($nic)
    {
        $this->nic = $nic;
    }

    /**
     * @return mixed
     */
    public function getOsCorte()
    {
        return $this->osCorte;
    }

    /**
     * @param mixed $osCorte
     */
    public function setOsCorte($osCorte)
    {
        $this->osCorte = $osCorte;
    }

    /**
     * @return mixed
     */
    public function getLecturaInicial()
    {
        return $this->lecturaInicial;
    }

    /**
     * @param mixed $lecturaInicial
     */
    public function setLecturaInicial($lecturaInicial)
    {
        $this->lecturaInicial = $lecturaInicial;
    }

    /**
     * @return mixed
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    /**
     * @return mixed
     */
    public function getFechaCorte()
    {
        return $this->fechaCorte;
    }

    /**
     * @param mixed $fechaCorte
     */
    public function setFechaCorte($fechaCorte)
    {
        $this->fechaCorte = $fechaCorte;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getOsReconexion()
    {
        return $this->osReconexion;
    }

    /**
     * @param mixed $osReconexion
     */
    public function setOsReconexion($osReconexion)
    {
        $this->osReconexion = $osReconexion;
    }

    /**
     * @return mixed
     */
    public function getLecturaFinal()
    {
        return $this->lecturaFinal;
    }

    /**
     * @param mixed $lecturaFinal
     */
    public function setLecturaFinal($lecturaFinal)
    {
        $this->lecturaFinal = $lecturaFinal;
    }

    /**
     * @return mixed
     */
    public function getFechaReconexion()
    {
        return $this->fechaReconexion;
    }

    /**
     * @param mixed $fechaReconexion
     */
    public function setFechaReconexion($fechaReconexion)
    {
        $this->fechaReconexion = $fechaReconexion;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * @param mixed $observacion
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    }

    /**
     * @return mixed
     */
    public function getPiezaRetirada()
    {
        return $this->piezaRetirada;
    }

    /**
     * @param mixed $piezaRetirada
     */
    public function setPiezaRetirada($piezaRetirada)
    {
        $this->piezaRetirada = $piezaRetirada;
    }

    /**
     * @return mixed
     */
    public function getTipoOs()
    {
        return $this->tipoOs;
    }

    /**
     * @param mixed $tipoOs
     */
    public function setTipoOs($tipoOs)
    {
        $this->tipoOs = $tipoOs;
    }

    /**
     * @return mixed
     */
    public function getFechaResolucion()
    {
        return $this->fechaResolucion;
    }

    /**
     * @param mixed $fechaResolucion
     */
    public function setFechaResolucion($fechaResolucion)
    {
        $this->fechaResolucion = $fechaResolucion;
    }

    /**
     * @return mixed
     */
    public function getMateriales()
    {
        return $this->materiales;
    }

    /**
     * @param mixed $materiales
     */
    public function setMateriales($materiales)
    {
        $this->materiales = $materiales;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param mixed $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * @return mixed
     */
    public function getTipoServicio()
    {
        return $this->tipoServicio;
    }

    /**
     * @param mixed $tipoServicio
     */
    public function setTipoServicio($tipoServicio)
    {
        $this->tipoServicio = $tipoServicio;
    }

    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param mixed $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

    function __toString()
    {
        return ('Servicio: '.$this->getCreador().', '.
            $this->getPlomero().', '.
            $this->getMedidor().', '.
            $this->getMedidorRetirado().', '.
            $this->getLlave().', '.
            $this->getNic().', '.
            $this->getOsCorte().', '.
            $this->getLecturaInicial().', '.
            $this->getEstatus().', '.
            $this->getFechaCorte().', '.
            $this->getEstado().', '.
            $this->getOsReconexion().', '.
            $this->getLecturaFinal().', '.
            $this->getFechaReconexion().', '.
            $this->getObservacion().', '.
            $this->getPiezaRetirada().', '.
            $this->getTipoOs().', '.
            $this->getFechaResolucion().', '.
            $this->getMateriales().', '.
            $this->getFechaCreacion().', '.
            $this->getTipoServicio().', '.
            $this->getExtra());
    }



}
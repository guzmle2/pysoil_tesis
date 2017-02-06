<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 06:25 PM
 */

include_once 'EntidadBase.php';
class MedidorRetirado extends EntidadBase{

    private $NIC;
    private $serial;
    private $marca;
    private $diametro;
    private $lectura;
    private $oficina;
    private $fechaRetiro;
    private $observacion;


    function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getNIC()
    {
        return $this->NIC;
    }

    /**
     * @param mixed $NIC
     */
    public function setNIC($NIC)
    {
        $this->NIC = $NIC;
    }

    /**
     * @return mixed
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * @param mixed $serial
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getDiametro()
    {
        return $this->diametro;
    }

    /**
     * @param mixed $diametro
     */
    public function setDiametro($diametro)
    {
        $this->diametro = $diametro;
    }

    /**
     * @return mixed
     */
    public function getLectura()
    {
        return $this->lectura;
    }

    /**
     * @param mixed $lectura
     */
    public function setLectura($lectura)
    {
        $this->lectura = $lectura;
    }

    /**
     * @return mixed
     */
    public function getOficina()
    {
        return $this->oficina;
    }

    /**
     * @param mixed $oficina
     */
    public function setOficina($oficina)
    {
        $this->oficina = $oficina;
    }

    /**
     * @return mixed
     */
    public function getFechaRetiro()
    {
        return $this->fechaRetiro;
    }

    /**
     * @param mixed $fechaRetiro
     */
    public function setFechaRetiro($fechaRetiro)
    {
        $this->fechaRetiro = $fechaRetiro;
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

    function __toString()
    {
        return ('MedidorRetirado: '.$this->getNic().', '.
            $this->getSerial().', '.
            $this->getMarca().', '.
            $this->getDiametro().', '.
            $this->getLectura().', '.
            $this->getOficina().', '.
            $this->getFechaRetiro().', '.
            $this->getObservacion());
    }


}
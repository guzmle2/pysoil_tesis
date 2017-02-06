<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 06:25 PM
 */

include_once 'EntidadBase.php';
class Medidor extends EntidadBase{



    private $nic;

    private $marca;

    private $serial;

    private $os;

    private $fechaRecibido;

    private $observacion;

    private $numero;

    private $diametro;
    function __construct()
    {
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
    public function getOs()
    {
        return $this->os;
    }

    /**
     * @param mixed $os
     */
    public function setOs($os)
    {
        $this->os = $os;
    }

    /**
     * @return mixed
     */
    public function getFechaRecibido()
    {
        return $this->fechaRecibido;
    }

    /**
     * @param mixed $fechaRecibido
     */
    public function setFechaRecibido($fechaRecibido)
    {
        $this->fechaRecibido = $fechaRecibido;
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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
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



    function __toString()
    {
        return ('Medidores: '.$this->getNic().', '.
            $this->getMarca().', '.
            $this->getSerial().', '.
            $this->getOs().', '.
            $this->getFechaRecibido().', '.
            $this->getObservacion().', '.
            $this->getNumero().', '.
            $this->getDiametro());
    }



}
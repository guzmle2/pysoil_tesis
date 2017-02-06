<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 09:15 PM
 */

include_once 'EntidadBase.php';
class Plomero extends EntidadBase{

    private $nombre;

    private $codigo;

    private $estatus;

    function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
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

    function __toString()
    {
        return ('Plomero: '.$this->getId().', '.
            $this->getNombre().', '.
            $this->getCodigo().', '.
            $this->getEstatus());
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 06:25 PM
 */

include_once 'EntidadBase.php';

class Usuario extends EntidadBase {


    private $login;
    private $clave;
    private $nombre;
    private $cedula;
    private $tipo;
    private $estado;

    function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
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
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * @param mixed $cedula
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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

    function __toString()
    {
        return ('Usuario: '.$this->getId().', '.
            $this->getNombre().', '.
            $this->getLogin().', '.
            $this->getClave().', '.
            $this->getTipo().', '.
            $this->getCedula());
    }
}
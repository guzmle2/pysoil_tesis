<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 06:26 PM
 */

include_once 'EntidadBase.php';
class Llave extends EntidadBase {


    private $nombre;

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


    function __toString()
    {
        return ('Llave: '.$this->getId().', '.
            $this->getNombre());
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 06:26 PM
 */

class EntidadBase {

    /**
     * @var identificador
     */
    private $id;

    function __construct()
    {
    }

    /**
     * @return identificador
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param identificador $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}
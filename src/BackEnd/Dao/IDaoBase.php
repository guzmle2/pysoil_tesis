<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 09:04 PM
 */

interface IDaoBase {

    public function agregar();

    public function modificar();

    public function eliminar();

    public function consultarXid();

    public function obtenerTodos();

    public function consultarXParametro();

    public function obtenerXParametro();

}
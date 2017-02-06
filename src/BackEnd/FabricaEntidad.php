<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 09:10 PM
 */


include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Entidad/Llave.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Entidad/Medidor.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Entidad/Orden.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Entidad/Plomero.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Entidad/Usuario.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Entidad/MedidorRetirado.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Conexion.php';
class FabricaEntidad {

    public static function entidadLlave(){
        return new Llave();
    }

    public static function entidadMedidor(){
        return new Medidor();
    }

    public static function entidadOrden(){
        return new Orden();
    }

    public static function entidadPlomero(){
        return new Plomero();
    }

    public static function entidadUsuario(){
        return new Usuario();
    }

    public static function Conexion(){
        return new Conexion();
    }

    public static function entidadTipoOrden()
    {
        return new TipoOrden();
    }

    public static function entidadCamposOrden()
    {
        return new CamposOrden();
    }

    public static function entidadMedidorRetirado()
    {
        return new MedidorRetirado();
    }

}
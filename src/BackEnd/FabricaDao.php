<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 09:10 PM
 */

include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/FabricaEntidad.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Dao/DaoLlave.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Dao/DaoMedidor.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Dao/DaoMedidorRetirado.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Dao/DaoOrden.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Dao/DaoPlomero.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/Dao/DaoUsuario.php';

class FabricaDao {

    public static function obtenerDaoUsuario(Usuario $usuario){
       return new DaoUsuario($usuario);
    }

    public static function obtenerDaoMedidor(Medidor $medidor){
        return new DaoMedidor($medidor);
    }

    public static function obtenerDaoLlave(Llave $llave){
        return new DaoLlave($llave);
    }

    public static function obtenerDaoPlomero(Plomero $plomero){
        return new DaoPlomero($plomero);
    }

    public static function obtenerDaoOrden(Orden $orden){
        return new DaoOrden($orden);
    }

    public static function obtenerDaoMedidorRetirado(MedidorRetirado $medidorRetirado)
    {
        return new DaoMedidorRetirado($medidorRetirado);
    }
}
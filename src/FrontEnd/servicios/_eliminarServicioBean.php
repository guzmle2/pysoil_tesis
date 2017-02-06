<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 23/07/2015
 * Time: 11:06 PM
 */

include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';
session_start();

if(isset($_GET['id'])){
    $orden = FabricaEntidad::entidadOrden();
    $orden->setId($_GET['id']);
    $dao = FabricaDao::obtenerDaoOrden($orden);
    $dao->eliminar();
    header("location: index.php?eliminado=si");

}else{
    header("location: index.php?eliminado=no");
}
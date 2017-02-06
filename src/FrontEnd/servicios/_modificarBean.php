<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 23/07/2015
 * Time: 11:25 PM
 */

include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';

$orden = FabricaEntidad::entidadOrden();
$orden->setId($_GET['id']);
$dao = FabricaDao::obtenerDaoOrden($orden);
$orden = $dao->consultarXid();

if($orden->getTipoServicio() == 'INHABILITACION'){
    header("location: formInhabilitacion.php?id=".$orden->getId());
}
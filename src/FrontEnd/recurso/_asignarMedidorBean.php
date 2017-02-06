<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 24/07/2015
 * Time: 01:14 AM
 */

include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';

$orden = FabricaEntidad::entidadOrden();
$orden->setNic($_POST['nic']);
$dao = FabricaDao::obtenerDaoOrden($orden);
$orden = $dao->consultarXNIC();
if($orden == null){
    header("location: asignarMedidor.php?nicExiste=no");
}

$Medidor = FabricaEntidad::entidadMedidor();
$Medidor->setNumero($_POST['numMedidor']);
$daoM = FabricaDao::obtenerDaoMedidor($Medidor);
$medidor = $daoM->consultarXParametro(' numero ',$Medidor->getNumero());
if($medidor == null){
    header("location: asignarMedidor.php?medidorExiste=no");
}

$dao->asignarMedidor($orden->getNic(), $medidor->getId());
header("location: asignarMedidor.php?asignado=si");

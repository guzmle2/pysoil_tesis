<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 24/07/2015
 * Time: 10:10 AM
 */

include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';

if(isset($_POST['llave']) && isset($_POST['nic']) ){

    $daoM = FabricaDao::obtenerDaoOrden(FabricaEntidad::entidadOrden());
    $orden = $daoM->consultarXParametro(' nic ',$_POST['nic']);
    if($orden == null){
        header("location: asignarLlave.php?ordenExiste=no");
    }else{
        $daoM->asignarLlave($_POST['llave'], $_POST['nic']);
        header("location: asignarLlave.php?asignado=si");
    }
}else{
    header("location: asignarLlave.php");
}



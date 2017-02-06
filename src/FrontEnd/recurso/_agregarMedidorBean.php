<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 24/07/2015
 * Time: 10:10 AM
 */

include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';

$medidor = FabricaEntidad::entidadMedidor();


if(isset($_POST['id'])){
    $medidor->setId($_POST['id']);
}

if(isset($_POST['nic'])){
    $medidor->setNic($_POST['nic']);
}

if(isset($_POST['marca'])){
    $medidor->setMarca($_POST['marca']);
}

if(isset($_POST['serial'])){
    $medidor->setSerial($_POST['serial']);
}

if(isset($_POST['numero'])){
    $medidor->setNumero($_POST['numero']);
}

if(isset($_POST['os'])){
    $medidor->setOs($_POST['os']);
}

if(isset($_POST['diametro'])){
    $medidor->setDiametro($_POST['diametro']);
}


if(isset($_POST['observacion'])){
    $medidor->setObservacion($_POST['observacion']);
}
$medidor->setFechaRecibido(date('Y-m-d'));
$dao = FabricaDao::obtenerDaoMedidor($medidor);
if($medidor->getId() != null){
    $medidor = $dao->modificar();
    if($medidor != null){
        header ("location: agregarMedidor.php?modificado=si");
    }else{
        header("location: agregarMedidor.php?modificado=no");
    }
}else{
    $medidor = $dao->agregar();
    if($medidor != null){
        header ("location: agregarMedidor.php?agregado=si");
    }else{
        header("location: agregarMedidor.php?agregado=no");
    }
}


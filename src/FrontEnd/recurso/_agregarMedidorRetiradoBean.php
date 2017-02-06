<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 24/07/2015
 * Time: 02:14 PM
 */

include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';

$medidor = FabricaEntidad::entidadMedidorRetirado();


if(isset($_POST['nic'])){
    $medidor->setNIC($_POST['nic']);
}

if(isset($_POST['serial'])){
    $medidor->setSerial($_POST['serial']);
}

if(isset($_POST['marca'])){
    $medidor->setMarca($_POST['marca']);
}

if(isset($_POST['diametro'])){
    $medidor->setDiametro($_POST['diametro']);
}


if(isset($_POST['lectura'])){
    $medidor->setLectura($_POST['lectura']);
}

if(isset($_POST['oficina'])){
    $medidor->setOficina($_POST['oficina']);
}

if(isset($_POST['fechaRetiro'])){
    $medidor->setFechaRetiro($_POST['fechaRetiro']);
}

if(isset($_POST['observacion'])){
    $medidor->setObservacion($_POST['observacion']);
}


$dao = FabricaDao::obtenerDaoMedidorRetirado($medidor);

    $medidor = $dao->agregar();
    if($medidor != null){
        header ("location: asignarRetiroMedidor.php?agregado=si");
    }else{
        header("location: asignarRetiroMedidor.php?agregado=no");
    }


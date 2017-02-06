<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 21/07/2015
 * Time: 10:47 PM
 */
include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';
session_start();
$usrCreador = $_SESSION['usuarioLogeado'];

if(isset($_POST['id'])){


    $Orden = FabricaEntidad::entidadOrden();
    $Orden->setId($_POST['id']);
    $dao = FabricaDao::obtenerDaoOrden($Orden);
    $Orden = $dao->consultarXid();

    $Plomero = FabricaEntidad::entidadPlomero();
    $Plomero->setId($_POST['plomero']);
    $Orden->setPlomero($Plomero);
    $Orden->setCreador($usrCreador);
    $Orden->setFechaCreacion(date('Y-m-d'));


    if(isset($_POST['nic'])){
        $Orden->setNIC($_POST['nic']);
    }

    if(isset($_POST['osCorte'])){
        $Orden->setOsCorte($_POST['osCorte']);
    }


    if(isset($_POST['lecturaInicial'])){
        $Orden->setLecturaInicial($_POST['lecturaInicial']);
    }

    if(isset($_POST['estatus'])){
        $Orden->setEstatus($_POST['estatus']);
    }

    if(isset($_POST['fechaCorte'])){
        $Orden->setFechaCorte($_POST['fechaCorte']);
    }

    if(isset($_POST['estado'])){
        $Orden->setEstado($_POST['estado']);
    }

    if(isset($_POST['osReconexion'])){
        $Orden->setOsReconexion($_POST['osReconexion']);
    }

    if(isset($_POST['lecturaFinal'])){
        $Orden->setLecturaFinal($_POST['lecturaFinal']);
    }

    if(isset($_POST['fechaReconexion'])){
        $Orden->setFechaReconexion($_POST['fechaReconexion']);
    }

    if(isset($_POST['observacion'])){
        $Orden->setObservacion($_POST['observacion']);
    }

    if(isset($_POST['piezaRetirada'])){
        $Orden->setPiezaRetirada($_POST['piezaRetirada']);
    }

    if(isset($_POST['tipoOs'])){
        $Orden->setTipoOs($_POST['tipoOs']);
    }

    if(isset($_POST['fechaResolucion'])){
        $Orden->setFechaResolucion($_POST['fechaResolucion']);
    }

    if(isset($_POST['materiales'])){
        $Orden->setMateriales($_POST['materiales']);
    }


    $Orden->setFechaCreacion(date('Y-m-d'));
    $Orden->setTipoServicio($_POST['tipoServicio']);

    $dao = FabricaDao::obtenerDaoOrden($Orden);
    $Orden = $dao->modificar();

    if($Orden != null){
        header("location: index.php?modificado=si");
    }else{
        header("location: index.php?modificado=no");
    }


}else{

    $Orden = FabricaEntidad::entidadOrden();
    $Plomero = FabricaEntidad::entidadPlomero();
    $Plomero->setId($_POST['plomero']);
    $Orden->setPlomero($Plomero);
    $Orden->setCreador($usrCreador);
    $Orden->setFechaCreacion(date('Y-m-d'));


    if(isset($_POST['nic'])){
        $Orden->setNIC($_POST['nic']);
    }

    if(isset($_POST['osCorte'])){
        $Orden->setOsCorte($_POST['osCorte']);
    }


    if(isset($_POST['lecturaInicial'])){
        $Orden->setLecturaInicial($_POST['lecturaInicial']);
    }

    if(isset($_POST['estatus'])){
        $Orden->setEstatus($_POST['estatus']);
    }

    if(isset($_POST['fechaCorte'])){
        $Orden->setFechaCorte($_POST['fechaCorte']);
    }

    if(isset($_POST['estado'])){
        $Orden->setEstado($_POST['estado']);
    }

    if(isset($_POST['osReconexion'])){
        $Orden->setOsReconexion($_POST['osReconexion']);
    }

    if(isset($_POST['lecturaFinal'])){
        $Orden->setLecturaFinal($_POST['lecturaFinal']);
    }

    if(isset($_POST['fechaReconexion'])){
        $Orden->setFechaReconexion($_POST['fechaReconexion']);
    }

    if(isset($_POST['observacion'])){
        $Orden->setObservacion($_POST['observacion']);
    }

    if(isset($_POST['piezaRetirada'])){
        $Orden->setPiezaRetirada($_POST['piezaRetirada']);
    }

    if(isset($_POST['tipoOs'])){
        $Orden->setTipoOs($_POST['tipoOs']);
    }

    if(isset($_POST['fechaResolucion'])){
        $Orden->setFechaResolucion($_POST['fechaResolucion']);
    }

    if(isset($_POST['materiales'])){
        $Orden->setMateriales($_POST['materiales']);
    }


    $Orden->setFechaCreacion(date('Y-m-d'));
    $Orden->setTipoServicio($_POST['tipoServicio']);

    $dao = FabricaDao::obtenerDaoOrden($Orden);
    $Orden = $dao->agregar();

    if($Orden != null){
        header("location: index.php?servicioAgregado=si");
    }else{
        header("location: index.php?servicioAgregado=no");
    }




}

<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 21/07/2015
 * Time: 10:47 PM
 */
include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';
session_start();

if(isset($_POST['parametro'])){
    $parametro = $_SESSION['parametro'];
}
if(isset($_POST['valor'])){
    $valor = $_SESSION['valor'];
}

if(isset($parametro)){
    if ($parametro == '*')
    {
        $dao = FabricaDao::obtenerDaoOrden(FabricaEntidad::entidadOrden());
        $Resultado = $dao->obtenerTodoDesc();
    }else{
        $dao = FabricaDao::obtenerDaoOrden(FabricaEntidad::entidadOrden());
        $Resultado = $dao->consultarXParametro($parametro, $valor);
    }

}


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
    $parametro = $_POST['parametro'];
    $_SESSION['parametro'] = $_POST['parametro'];
}else{
    $parametro = '*';
}
if(isset($_POST['valor'])){
    $valor = $_POST['valor'];
    $_SESSION['valor'] = $_POST['valor'];
}

if ($parametro == '*')
{
    $dao = FabricaDao::obtenerDaoOrden(FabricaEntidad::entidadOrden());
    $Resultado = $dao->obtenerTodoDesc();
}else{
    header("location: busquedaParametro.php");
}


<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 21/07/2015
 * Time: 08:32 PM
 */

include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';

$usuario = FabricaEntidad::entidadUsuario();


if(isset($_POST['nombre'])){
    $usuario->setNombre($_POST['nombre']);
}
if(isset($_POST['login'])){
    $usuario->setLogin($_POST['login']);
}
if(isset($_POST['clave'])){
    $usuario->setClave($_POST['clave']);
}
if(isset($_POST['tipo'])){
    $usuario->setTipo($_POST['tipo']);
}
if(isset($_POST['cedula'])){
    $usuario->setCedula($_POST['cedula']);
}

$dao = FabricaDao::obtenerDaoUsuario($usuario);
$usuario = $dao->agregar();

if($usuario != null){
    session_start();
    header("location: menu.php?registrado=si");

}else{
    header("location: index.php?registrado=no");
}
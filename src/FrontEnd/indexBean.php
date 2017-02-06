<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 21/07/2015
 * Time: 08:32 PM
 */

include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';

$usuario = FabricaEntidad::entidadUsuario();
$dao = FabricaDao::obtenerDaoUsuario($usuario);
$usuario = $dao->consultarXParametro('login', $_POST['login']);

if($usuario != null){
    if($usuario->getClave() == $_POST['clave'])
    {
        session_start();
        $_SESSION['usuarioLogeado'] = $usuario;
        header("location: menu.php");

    }else{
        header("location: index.php?errorusuario=si");
    }
}else{
    header("location: index.php?usuarionuevo=no");
}


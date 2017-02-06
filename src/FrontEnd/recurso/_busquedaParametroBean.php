<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 24/07/2015
 * Time: 02:01 AM
 */

if($_POST['parametro'] && $_POST['valor']){
    header("location: buscar.php?parametro=".$_POST['parametro']."&valor=".$_POST['valor']);
}else{
    header("location: buscar.php");
}
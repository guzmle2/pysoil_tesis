<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 23/07/2015
 * Time: 10:36 AM
 */

include_once '../FabricaEntidad.php';
include_once '../FabricaDao.php';

class DaoOrdenTest extends PHPUnit_Framework_TestCase {

    var $Orden;

    public function setUp(){

        $usrCreador = FabricaEntidad::entidadUsuario();
        $usrCreador->setId(1);
        $Orden = FabricaEntidad::entidadOrden();
        $Plomero = FabricaEntidad::entidadPlomero();
        $Plomero->setId(1);
        $Orden->setPlomero($Plomero);
        $Orden->setCreador($usrCreador);
        $Orden->setFechaCreacion(date('Y-m-d'));
        $Orden->setLecturaInicial("lectura");
        $Orden->setOsCorte(date('Y-m-d'));
        $Orden->setFechaCorte(date('Y-m-d'));
        $Orden->setOsReconexion("osRecno");
        $Orden->setLecturaFinal("lecturaFinal");
        $Orden->setFechaReconexion("fechaReconexion");
        $Orden->setObservacion("observacion");
        $Orden->setNIC("nic");
        $Orden->setTipoServicio("tipoServicio");

        $this->Orden = $Orden;
    }

    public function testOrdenSuspension(){
        $this->Orden->setId(2);
        $dao = FabricaDao::obtenerDaoOrden($this->Orden);
        $Orden = $dao->modificar();
        $modificado = $dao->consultarXid();
        $this->assertEquals($Orden,$modificado);
    }
}
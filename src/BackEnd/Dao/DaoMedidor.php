<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 09:05 PM
 */

include_once 'IDaoBase.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/FabricaDao.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/FabricaEntidad.php';
class DaoMedidor{

    private $Medidor;

    const TABLA = 'medidores';

    const STRING_SQL = ' (  NIC, marca, serial, os, fechaRecibido, observacion, numero, diametro )';

    const STRING_PARAMETROS = '(  :NIC, :marca, :serial, :os, :fechaRecibido, :observacion, :numero, :diametro )';

    const STRING_MODIFICA = '  NIC = :NIC,
     marca = :marca,
       serial = :serial,
        os = :os,
         fechaRecibido = :fechaRecibido,
          observacion = :observacion,
           numero = :numero,
      diametro = :diametro ';

    function __construct(Medidor $medidor)
    {
        $this->Medidor = $medidor;
    }


    public function agregar()
    {
        $conexion = FabricaEntidad::Conexion();;
        if($this->objetoCompleto()){
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA.self::STRING_SQL . ' VALUE ' . self::STRING_PARAMETROS);
            $consulta->bindParam(':NIC', $this->Medidor->getNic());
            $consulta->bindParam(':marca', $this->Medidor->getMarca());
            $consulta->bindParam(':serial', $this->Medidor->getSerial());
            $consulta->bindParam(':os', $this->Medidor->getOs());
            $consulta->bindParam(':fechaRecibido', $this->Medidor->getFechaRecibido());
            $consulta->bindParam(':observacion', $this->Medidor->getObservacion());
            $consulta->bindParam(':numero', $this->Medidor->getNumero());
            $consulta->bindParam(':diametro', $this->Medidor->getDiametro());
            $consulta->execute();
            $this->Medidor->setId( $conexion->lastInsertId() );
            $conexion = null;
            if($this->Medidor->getId() != null && $this->Medidor->getId() != 0){
                return $this->Medidor;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public function modificar()
    {
        $conexion = FabricaEntidad::Conexion();;
        if($this->objetoCompleto() && $this->Medidor->getId() != null &&  $this->Medidor->getId() != 0 ){
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET '.self::STRING_MODIFICA.' WHERE id = :id');
            $consulta->bindParam(':NIC', $this->Medidor->getNic());
            $consulta->bindParam(':marca', $this->Medidor->getMarca());
            $consulta->bindParam(':serial', $this->Medidor->getSerial());
            $consulta->bindParam(':os', $this->Medidor->getOs());
            $consulta->bindParam(':fechaRecibido', $this->Medidor->getFechaRecibido());
            $consulta->bindParam(':observacion', $this->Medidor->getObservacion());
            $consulta->bindParam(':numero', $this->Medidor->getNumero());
            $consulta->bindParam(':diametro', $this->Medidor->getDiametro());
            $consulta->bindParam(':id', $this->Medidor->getId());
            $consulta->execute();
            $conexion = null;
            if($this->Medidor->getId() != null){
                return $this->Medidor;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public function eliminar()
    {
        $conexion = FabricaEntidad::Conexion();;
        if($this->Medidor->getId() != 0 && $this->Medidor->getId() != null )
        {
            try{
                $consulta = $conexion->prepare( 'DELETE FROM ' . self::TABLA .' WHERE id = :parametro');
                $consulta->bindParam(':parametro', $this->Medidor->getId());
                $resultado = $consulta->execute();
                $conexion = null;
                return $resultado;

            }catch (Exception $e){
                $conexion = null;
                return false;
            }
        }else{
            return false;
        }
    }

    public function consultarXid()
    {
        $conexion = FabricaEntidad::Conexion();;
        if ( $this->Medidor->getId() != null )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE id = :id');
            $consulta->bindParam(':id', $this->Medidor->getId());
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarObjeto($registro);
            }else{
                $this->Medidor = null;
            }
        }else{
            $this->Medidor = null;
        }
        $conexion = null;
        return $this->Medidor;
    }

    public function obtenerTodos()
    {
        $conexion = FabricaEntidad::Conexion();;
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA .' order by 1 desc ');
        $consulta->execute();
        $Revisiones = $consulta->fetchAll();
        $conexion = null;
        $objetos = $this->armarListaObjetos($Revisiones);
        return $objetos;
    }


    public function consultarXParametro($parametro, $valor)
    {
        $conexion = FabricaEntidad::Conexion();;
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE '.$parametro.' = :id');
            $consulta->bindParam(':id', $valor);
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarObjeto($registro);
            }else{
                $this->Medidor = null;
            }
        $conexion = null;
        return $this->Medidor;

    }


    public function obtenerListaXParametro($parametro, $valor)
    {
        $conexion = FabricaEntidad::Conexion();;
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA .' WHERE '.$parametro.' = :id');
        $consulta->bindParam(':id', $valor);
        $consulta->execute();
        $Revisiones = $consulta->fetchAll();
        $conexion = null;
        $objetos = $this->armarListaObjetos($Revisiones);
        return $objetos;
    }



    private function objetoCompleto()
    {
        if(($this->Medidor->getMarca() != null && $this->Medidor->getMarca() != '' )
            && ($this->Medidor->getSerial() != null && $this->Medidor->getSerial() != '' )
            && ($this->Medidor->getOs() != null && $this->Medidor->getOs() != '' )
            && ($this->Medidor->getNumero() != null && $this->Medidor->getNumero() != '' )
            && ($this->Medidor->getDiametro() != null && $this->Medidor->getDiametro() != '' )
            && ($this->Medidor->getFechaRecibido() != null && $this->Medidor->getFechaRecibido() != '' ))
        {
            return true;
        }else{
            return false;
        }
    }

    private function armarObjeto($registro)
    {
        $this->Medidor->setId($registro['id']);
        $this->Medidor->setNic($registro['NIC']);
        $this->Medidor->setMarca($registro['marca']);
        $this->Medidor->setSerial($registro['serial']);
        $this->Medidor->setOs($registro['os']);
        $this->Medidor->setFechaRecibido($registro['fechaRecibido']);
        $this->Medidor->setObservacion($registro['observacion']);
        $this->Medidor->setNumero($registro['numero']);
        $this->Medidor->setDiametro($registro['diametro']);

    }

    private function armarListaObjetos($Revisiones)
    {
        $pila = array();
        for($i=0;$i<count($Revisiones);$i++){
            $objeto = new Medidor();

            $objeto->setId($Revisiones[$i]['id']);
            $objeto->setNic($Revisiones[$i]['NIC']);
            $objeto->setMarca($Revisiones[$i]['marca']);
            $objeto->setSerial($Revisiones[$i]['serial']);
            $objeto->setOs($Revisiones[$i]['os']);
            $objeto->setFechaRecibido($Revisiones[$i]['fechaRecibido']);
            $objeto->setObservacion($Revisiones[$i]['observacion']);
            $objeto->setNumero($Revisiones[$i]['numero']);
            $objeto->setDiametro($Revisiones[$i]['diametro']);
            array_push($pila, $objeto);
        }

        return $pila;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/07/2015
 * Time: 09:16 PM
 */

include_once 'IDaoBase.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/FabricaDao.php';
include_once 'C:\xampp/htdocs/PYSOIL/src/BackEnd/FabricaEntidad.php';
class DaoPlomero{

    private $Plomero;

    const TABLA = 'plomero';
    const STRING_SQL = ' (  nombre, codigo, estatus )';
    const STRING_PARAMETROS = '( :nombre, :codigo, :estatus )';
    const STRING_MODIFICA = '(  nombre = :nombre, codigo = :codigo, estatus :estatus )';


    function __construct(Plomero $plomero)
    {
        $this->Plomero = $plomero;
    }

    public function agregar()
    {
        $conexion = FabricaEntidad::Conexion();;
        if($this->objetoCompleto()){
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA.self::STRING_SQL . ' VALUES ' . self::STRING_PARAMETROS);
            $consulta->bindParam(':nombre', $this->Plomero->getNombre());
            $consulta->bindParam(':codigo', $this->Plomero->getCodigo());
            $consulta->bindParam(':estatus', $this->Plomero->getEstatus());
            $consulta->execute();
            $this->Plomero->setId( $conexion->lastInsertId() );
            $conexion = null;
            if($this->Plomero->getId() != null){
                return $this->Plomero;
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
        if($this->objetoCompleto() && $this->Plomero->getId() != null &&  $this->Plomero->getId() != 0 ){
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET '.self::STRING_MODIFICA.' WHERE id = :id');
            $consulta->bindParam(':nombre', $this->Plomero->getNombre());
            $consulta->bindParam(':codigo', $this->Plomero->getCodigo());
            $consulta->bindParam(':estatus', $this->Plomero->getEstatus());
            $consulta->bindParam(':id', $this->Plomero->getId());
            $consulta->execute();
            $conexion = null;
            if($this->Plomero->getId() != null){
                return $this->Plomero;
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
        if($this->Plomero->getId() != 0 && $this->Plomero->getId() != null )
        {
            try{
                $consulta = $conexion->prepare( 'DELETE FROM ' . self::TABLA .' WHERE id = :parametro');
                $consulta->bindParam(':parametro', $this->Plomero->getId());
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
        if ( $this->Plomero->getId() != null )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE id = :id');
            $consulta->bindParam(':id', $this->Plomero->getId());
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarObjeto($registro);
            }else{
                $this->Plomero = null;
            }
        }else{
            $this->Plomero = null;
        }
        $conexion = null;
        return $this->Plomero;
    }

    public function obtenerTodos()
    {
        $conexion = FabricaEntidad::Conexion();;
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA );
        $consulta->execute();
        $Revisiones = $consulta->fetchAll();
        $conexion = null;
        $objetos = $this->armarListaObjetos($Revisiones);
        return $objetos;
    }


    public function consultarXParametro($parametro, $valor)
    {
        $conexion = FabricaEntidad::Conexion();;
        if ( $this->Plomero->getNombre() != null && $this->Plomero->getNombre() != '' )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE '.$parametro.' = :id');
            $consulta->bindParam(':id', $valor);
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarObjeto($registro);
            }else{
                $this->Plomero = null;
            }
        }else{
            $this->Plomero = null;
        }
        $conexion = null;
        return $this->Plomero;

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
        if(($this->Plomero->getNombre() != null && $this->Plomero->getNombre() != '' )
            && ($this->Plomero->getCodigo() != null && $this->Plomero->getCodigo() != '' )
            && ($this->Plomero->getEstatus() != null && $this->Plomero->getEstatus() != '' ))
        {
            return true;
        }else{
            return false;
        }
    }

    private function armarObjeto($registro)
    {
        $this->Plomero->setId($registro['id']);
        $this->Plomero->setNombre($registro['nombre']);
        $this->Plomero->setCodigo($registro['codigo']);
        $this->Plomero->setEstatus($registro['estatus']);

    }

    private function armarListaObjetos($Revisiones)
    {
        $pila = array();
        for($i=0;$i<count($Revisiones);$i++){
            $objeto = new Plomero();

            $objeto->setId($Revisiones[$i]['id']);
            $objeto->setNombre($Revisiones[$i]['nombre']);
            $objeto->setCodigo($Revisiones[$i]['codigo']);
            $objeto->setEstatus($Revisiones[$i]['estatus']);
            array_push($pila, $objeto);
        }

        return $pila;
    }
}
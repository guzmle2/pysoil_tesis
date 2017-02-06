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
class DaoLlave {


    private $Llave;

    const TABLA = 'llaves';
    const STRING_SQL = ' ( nombre )';
    const STRING_PARAMETROS = '( :nombre )';

    function __construct(Llave $llave)
    {
        $this->Llave = $llave;
    }

    public function agregar()
    {
        $conexion = FabricaEntidad::Conexion();;
       if($this->LlaveCompleta()){
           $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA.self::STRING_SQL . ' VALUES ' . self::STRING_PARAMETROS);
           $consulta->bindParam(':nombre', $this->Llave->getNombre());
           $consulta->execute();
           $this->Llave->setId( $conexion->lastInsertId() );
           $conexion = null;
           if($this->Llave->getId() != null){
               return $this->Llave;
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
        if($this->LlaveCompleta() && $this->Llave->getId() != null &&  $this->Llave->getId() != 0 ){
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET ( nomre = :nombre ) WHERE id = :id');
            $consulta->bindParam(':nombre', $this->Llave->getNombre());
            $consulta->bindParam(':id', $this->Llave->getId());
            $consulta->execute();
            $conexion = null;
            if($this->Llave->getId() != null){
                return $this->Llave;
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
       if($this->Llave->getId() != 0 && $this->Llave->getId() != null )
       {
           try{
               $consulta = $conexion->prepare( 'DELETE FROM ' . self::TABLA .' WHERE id = :parametro');
               $consulta->bindParam(':parametro', $this->Llave->getId());
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
        if ( $this->Llave->getId() != null )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE id = :id');
            $consulta->bindParam(':id', $this->Llave->getId());
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarLlave($registro);
            }else{
                $this->Llave = null;
            }
        }else{
            $this->Llave = null;
        }
        $conexion = null;
        return $this->Llave;
    }

    public function obtenerTodos()
    {
        $conexion = FabricaEntidad::Conexion();;
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA );
        $consulta->execute();
        $Revisiones = $consulta->fetchAll();
        $conexion = null;
        $llaves = $this->armarLlaves($Revisiones);
        return $llaves;
    }

    public function consultarXNombre()
    {
        $conexion = FabricaEntidad::Conexion();;
        if ( $this->Llave->getNombre() != null && $this->Llave->getNombre() != '' )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE nombre = :id');
            $consulta->bindParam(':id', $this->Llave->getNombre());
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarLlave($registro);
            }else{
                $this->Llave = null;
            }
        }else{
            $this->Llave = null;
        }
        $conexion = null;
        return $this->Llave;

    }



    private function LlaveCompleta()
    {
        if($this->Llave->getNombre() != null && $this->Llave->getNombre() != '' )
        {
            return true;
        }else{
            return false;
        }
    }

    private function armarLlave($registro)
    {
        $this->Llave->setId($registro['id']);
        $this->Llave->setNombre($registro['nombre']);
    }

    private function armarLlaves($Revisiones)
    {
        $pila = array();
        for($i=0;$i<count($Revisiones);$i++){
            $llave = FabricaEntidad::entidadLlave();

            $llave->setId($Revisiones[$i]['id']);
            $llave->setNombre($Revisiones[$i]['nombre']);

            array_push($pila, $llave);
        }

        return $pila;
    }
}
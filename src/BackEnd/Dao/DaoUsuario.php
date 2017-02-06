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
class DaoUsuario {

    private $Usuario;

    const TABLA = 'usuario';
    const STRING_SQL = ' (  nombre_apellido, login, clave, tipo, cedula, estado )';
    const STRING_PARAMETROS = '( :nombre_apellido, :login, :clave, :tipo, :cedula, :estado )';
    const STRING_MODIFICA = '  nombre_apellido = :nombre_apellido, login = :login, clave = :clave, tipo = :tipo, cedula = :cedula, estado = :estado  ';

    function __construct(Usuario $usr)
    {
        $this->Usuario = $usr;
    }

    public function agregar()
    {
        $conexion = FabricaEntidad::Conexion();;
        if($this->objetoCompleto()){
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA.self::STRING_SQL . ' VALUES ' . self::STRING_PARAMETROS);
            $consulta->bindParam(':nombre_apellido', $this->Usuario->getNombre());
            $consulta->bindParam(':login', $this->Usuario->getLogin());
            $consulta->bindParam(':clave', $this->Usuario->getClave());
            $consulta->bindParam(':tipo', $this->Usuario->getTipo());
            $consulta->bindParam(':cedula', $this->Usuario->getCedula());
            $consulta->bindParam(':estado', $this->Usuario->getEstado());
            $consulta->execute();
            $this->Usuario->setId( $conexion->lastInsertId() );
            $conexion = null;
            if($this->Usuario->getId() != null && $this->Usuario->getId() != 0){
                return $this->Usuario;
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
        if($this->objetoCompleto() && $this->Usuario->getId() != null &&  $this->Usuario->getId() != 0 ){
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET '.self::STRING_MODIFICA.' WHERE id = :id');
            $consulta->bindParam(':nombre_apellido', $this->Usuario->getNombre());
            $consulta->bindParam(':login', $this->Usuario->getLogin());
            $consulta->bindParam(':clave', $this->Usuario->getClave());
            $consulta->bindParam(':tipo', $this->Usuario->getTipo());
            $consulta->bindParam(':cedula', $this->Usuario->getCedula());
            $consulta->bindParam(':estado', $this->Usuario->getEstado());
            $consulta->bindParam(':id', $this->Usuario->getId());
            $consulta->execute();
            $conexion = null;
            if($this->Usuario->getId() != null){
                return $this->Usuario;
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
        if($this->Usuario->getId() != 0 && $this->Usuario->getId() != null )
        {
            try{
                $consulta = $conexion->prepare( 'DELETE FROM ' . self::TABLA .' WHERE id = :parametro');
                $consulta->bindParam(':parametro', $this->Usuario->getId());
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
        $conexion = FabricaEntidad::Conexion();
        if ( $this->Usuario->getId() != null )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE id = :id');
            $consulta->bindParam(':id', $this->Usuario->getId());
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarObjeto($registro);
            }else{
                $this->Usuario = null;
            }
        }else{
            $this->Usuario = null;
        }
        $conexion = null;
        return $this->Usuario;
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
        $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE '.$parametro.' = :id ');
        $consulta->bindParam(':id', $valor);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            $this->armarObjeto($registro);
        }else{
            $this->Usuario = null;
        }
        $conexion = null;
        return $this->Usuario;

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
        if(($this->Usuario->getNombre() != null && $this->Usuario->getNombre() != '' )
            && ($this->Usuario->getLogin() != null && $this->Usuario->getLogin() != '' )
            && ($this->Usuario->getClave() != null && $this->Usuario->getClave() != '' )
            && ($this->Usuario->getTipo() != null && $this->Usuario->getTipo() != '' )
            && ($this->Usuario->getCedula() != null && $this->Usuario->getCedula() != '' ))
        {
            return true;
        }else{
            return false;
        }
    }

    private function armarObjeto($registro)
    {
        $this->Usuario->setId($registro['id']);
        $this->Usuario->setNombre($registro['nombre_apellido']);
        $this->Usuario->setLogin($registro['login']);
        $this->Usuario->setClave($registro['clave']);
        $this->Usuario->setTipo($registro['tipo']);
        $this->Usuario->setCedula($registro['cedula']);
        $this->Usuario->setEstado($registro['estado']);

    }

    private function armarListaObjetos($Revisiones)
    {
        $pila = array();
        for($i=0;$i<count($Revisiones);$i++){
            $objeto = new Usuario();

            $objeto->setId($Revisiones[$i]['id']);
            $objeto->setNombre($Revisiones[$i]['nombre_apellido']);
            $objeto->setLogin($Revisiones[$i]['login']);
            $objeto->setClave($Revisiones[$i]['clave']);
            $objeto->setTipo($Revisiones[$i]['tipo']);
            $objeto->setCedula($Revisiones[$i]['cedula']);
            $objeto->setEstado($Revisiones[$i]['estado']);

            array_push($pila, $objeto);
        }

        return $pila;
    }
}
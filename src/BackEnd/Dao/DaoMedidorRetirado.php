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
class DaoMedidorRetirado {

    private $Medidor;

    const TABLA = 'medidoresretirado';

    const STRING_SQL = ' (
    NIC,
     serial,
      marca,
       diametro,
        lectura,
         oficina,
          fechaRetiro,
           observacion )';

    const STRING_PARAMETROS = '(
   :NIC,
     :serial,
      :marca,
       :diametro,
        :lectura,
         :oficina,
          :fechaRetiro,
           :observacion )';

    const STRING_MODIFICA = '(
   NIC = :NIC,
     serial = :serial,
      marca = :marca,
       diametro = :diametro,
        lectura = :lectura,
         oficina = :oficina,
          fechaRetiro = :fechaRetiro,
           observacion = :observacion )';

    function __construct(MedidorRetirado $medidor)
    {
        $this->MedidorRetirado = $medidor;
    }


    public function agregar()
    {
        $conexion = FabricaEntidad::Conexion();;
        if($this->objetoCompleto()){
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA.self::STRING_SQL . ' VALUES ' . self::STRING_PARAMETROS);
            $consulta->bindParam(':NIC', $this->MedidorRetirado->getNic());
            $consulta->bindParam(':serial', $this->MedidorRetirado->getSerial());
            $consulta->bindParam(':marca', $this->MedidorRetirado->getMarca());
            $consulta->bindParam(':diametro', $this->MedidorRetirado->getDiametro());
            $consulta->bindParam(':lectura', $this->MedidorRetirado->getLectura());
            $consulta->bindParam(':oficina', $this->MedidorRetirado->getOficina());
            $consulta->bindParam(':fechaRetiro', $this->MedidorRetirado->getFechaRetiro());
            $consulta->bindParam(':observacion', $this->MedidorRetirado->getObservacion());
            $consulta->execute();
            $this->MedidorRetirado->setId( $conexion->lastInsertId() );
            $conexion = null;

            $dao = FabricaDao::obtenerDaoMedidorRetirado(FabricaEntidad::entidadMedidorRetirado());
            $dao->modificarXParametro($this->MedidorRetirado->getId(),$this->MedidorRetirado->getNic() );
            if($this->MedidorRetirado->getId() != null){
                return $this->MedidorRetirado;
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
        if($this->objetoCompleto() && $this->MedidorRetirado->getId() != null &&  $this->MedidorRetirado->getId() != 0 ){
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET '.self::STRING_MODIFICA.' WHERE id = :id');
            $consulta->bindParam(':NIC', $this->MedidorRetirado->getNic());
            $consulta->bindParam(':serial', $this->MedidorRetirado->getSerial());
            $consulta->bindParam(':marca', $this->MedidorRetirado->getMarca());
            $consulta->bindParam(':diametro', $this->MedidorRetirado->getDiametro());
            $consulta->bindParam(':lectura', $this->MedidorRetirado->getLectura());
            $consulta->bindParam(':oficina', $this->MedidorRetirado->getOficina());
            $consulta->bindParam(':fechaRetiro', $this->MedidorRetirado->getFechaRetiro());
            $consulta->bindParam(':observacion', $this->MedidorRetirado->getObservacion());
            $consulta->bindParam(':id', $this->MedidorRetirado->getId());
            $consulta->execute();
            $conexion = null;
            if($this->MedidorRetirado->getId() != null){
                return $this->MedidorRetirado;
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
        if($this->MedidorRetirado->getId() != 0 && $this->MedidorRetirado->getId() != null )
        {
            try{
                $consulta = $conexion->prepare( 'DELETE FROM ' . self::TABLA .' WHERE id = :parametro');
                $consulta->bindParam(':parametro', $this->MedidorRetirado->getId());
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
        if ( $this->MedidorRetirado->getId() != null )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE id = :id');
            $consulta->bindParam(':id', $this->MedidorRetirado->getId());
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarObjeto($registro);
            }else{
                $this->MedidorRetirado = null;
            }
        }else{
            $this->MedidorRetirado = null;
        }
        $conexion = null;
        return $this->MedidorRetirado;
    }


    public function consultarXNIC()
    {
        $conexion = FabricaEntidad::Conexion();;
        if ( $this->MedidorRetirado->getId() != null )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE nic = :id');
            $consulta->bindParam(':id', $this->MedidorRetirado->getNIC());
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarObjeto($registro);
            }else{
                $this->MedidorRetirado = null;
            }
        }else{
            $this->MedidorRetirado = null;
        }
        $conexion = null;
        return $this->MedidorRetirado;
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

    public function obtenerTodosDesc()
    {
        $conexion = FabricaEntidad::Conexion();;
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' order by 1 desc '  );
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
                $this->MedidorRetirado = null;
            }
        $conexion = null;
        return $this->MedidorRetirado;

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
        if(($this->MedidorRetirado->getNic() != null && $this->MedidorRetirado->getNic() != '' )
            && ($this->MedidorRetirado->getSerial() != null && $this->MedidorRetirado->getSerial() != '' )
            && ($this->MedidorRetirado->getMarca() != null && $this->MedidorRetirado->getMarca() != '' )
            && ($this->MedidorRetirado->getDiametro() != null && $this->MedidorRetirado->getDiametro() != '' )
            && ($this->MedidorRetirado->getLectura() != null && $this->MedidorRetirado->getLectura() != '' )
            && ($this->MedidorRetirado->getOficina() != null && $this->MedidorRetirado->getOficina() != '' )
            && ($this->MedidorRetirado->getFechaRetiro() != null && $this->MedidorRetirado->getFechaRetiro() != '' ))
        {
            return true;
        }else{
            return false;
        }
    }

    private function armarObjeto($registro)
    {
        $this->MedidorRetirado->setId($registro['id']);
        $this->MedidorRetirado->setNic($registro['nic']);
        $this->MedidorRetirado->setMarca($registro['marca']);
        $this->MedidorRetirado->setSerial($registro['serial']);
        $this->MedidorRetirado->setDiametro($registro['diametro']);
        $this->MedidorRetirado->setLectura($registro['lectura']);
        $this->MedidorRetirado->setOficina($registro['oficina']);
        $this->MedidorRetirado->setFechaRetiro($registro['fechaRetiro']);
        $this->MedidorRetirado->setObservacion($registro['observacion']);

    }

    private function armarListaObjetos($Revisiones)
    {
        $pila = array();
        for($i=0;$i<count($Revisiones);$i++){
            $objeto = new MedidorRetirado();


            $objeto->setId($Revisiones[$i]['id']);
            $objeto->setNic($Revisiones[$i]['nic']);
            $objeto->setMarca($Revisiones[$i]['marca']);
            $objeto->setSerial($Revisiones[$i]['serial']);
            $objeto->setDiametro($Revisiones[$i]['diametro']);
            $objeto->setLectura($Revisiones[$i]['lectura']);
            $objeto->setOficina($Revisiones[$i]['oficina']);
            $objeto->setFechaRetiro($Revisiones[$i]['fechaRetiro']);
            $objeto->setObservacion($Revisiones[$i]['observacion']);
            array_push($pila, $objeto);
        }

        return $pila;
    }

    private function modificarXParametro($getId, $getNic)
    {
        $conexion = FabricaEntidad::Conexion();;
        if( $getId != '' &&  $getNic != '' ){
            $consulta = $conexion->prepare('UPDATE servicio SET id_medidorRetirado = :id_medidorRetirado WHERE nic = :nic');
            $consulta->bindParam(':nic', $getNic);
            $consulta->bindParam(':id_medidorRetirado', $getId);
            $consulta->execute();
            $conexion = null;
        }else{
            return null;
        }
    }
}
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
class DaoOrden  {

    private $Orden;

    const TABLA = 'servicio';
    const STRING_SQL = ' ( id_creador,
     id_plomero,
      id_medidor,
      id_medidorRetirado,
      id_llave,
      nic,
      osCorte,
      lecturaInicial,
      estatus,
      fechaCorte,
      estado,
      osReconexion,
      lecturaFinal,
      fechaReconexion,
      observacion,
      piezaRetirada,
      tipoOs,
      fechaResolucion,
      materiales,
      fechaCreacion,
      tipoServicio,
      campoExtra)';

    const STRING_PARAMETROS = '( :id_creador,
    :id_plomero,
    :id_medidor,
    :id_medidorRetirado,
    :id_llave,
    :nic,
    :osCorte,
    :lecturaInicial,
    :estatus,
    :fechaCorte,
    :estado,
    :osReconexion,
    :lecturaFinal,
    :fechaReconexion,
    :observacion,
    :piezaRetirada,
    :tipoOs,
    :fechaResolucion,
    :materiales,
    :fechaCreacion,
    :tipoServicio,
    :campoExtra)';

    const STRING_MODIFICA = '  id_creador = :id_creador,
    id_plomero = :id_plomero,
    id_medidor = :id_medidor,
    id_medidorRetirado = :id_medidorRetirado,
    id_llave = :id_llave,
    nic = :nic,
    osCorte = :osCorte,
    lecturaInicial = :lecturaInicial,
    estatus	= :estatus,
    fechaCorte = :fechaCorte,
    estado = :estado,
    osReconexion = :osReconexion,
    lecturaFinal = :lecturaFinal,
    fechaReconexion = :fechaReconexion,
    observacion = :observacion,
    piezaRetirada = :piezaRetirada,
    tipoOs = :tipoOs,
    fechaResolucion = :fechaResolucion,
    materiales = :materiales,
    fechaCreacion = :fechaCreacion,
    tipoServicio = :tipoServicio,
    campoExtra = :campoExtra';

    function __construct(Orden $orden)
    {
        $this->Orden = $orden;
    }


    public function agregar()
     {
         $conexion = FabricaEntidad::Conexion();;
        if($this->objetoCompleto()){
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA.self::STRING_SQL . ' VALUE ' . self::STRING_PARAMETROS);
            $consulta->bindParam(':id_creador', $this->Orden->getCreador()->getId());
            $consulta->bindParam(':id_plomero', $this->Orden->getPlomero()->getId());
            $consulta->bindParam(':id_medidor', $this->idValidoIdObjeto($this->Orden->getMedidor()));
            $consulta->bindParam(':id_medidorRetirado', $this->idValidoIdObjeto($this->Orden->getMedidorRetirado()));
            $consulta->bindParam(':id_llave', $this->idValidoIdObjeto($this->Orden->getLlave()));
            $consulta->bindParam(':nic', $this->Orden->getNic());
            $consulta->bindParam(':osCorte', $this->Orden->getOsCorte());
            $consulta->bindParam(':lecturaInicial', $this->Orden->getLecturaInicial());
            $consulta->bindParam(':estatus', $this->Orden->getEstatus());
            $consulta->bindParam(':fechaCorte', $this->Orden->getFechaCorte());
            $consulta->bindParam(':estado', $this->Orden->getEstado());
            $consulta->bindParam(':osReconexion', $this->Orden->getOsReconexion());
            $consulta->bindParam(':lecturaFinal', $this->Orden->getLecturaFinal());
            $consulta->bindParam(':fechaReconexion', $this->Orden->getFechaReconexion());
            $consulta->bindParam(':observacion', $this->Orden->getObservacion());
            $consulta->bindParam(':piezaRetirada', $this->Orden->getPiezaRetirada());
            $consulta->bindParam(':tipoOs', $this->Orden->getTipoOs());
            $consulta->bindParam(':fechaResolucion', $this->Orden->getFechaResolucion());
            $consulta->bindParam(':materiales', $this->Orden->getMateriales());
            $consulta->bindParam(':fechaCreacion', $this->Orden->getFechaCreacion());
            $consulta->bindParam(':tipoServicio', $this->Orden->getTipoServicio());
            $consulta->bindParam(':campoExtra', $this->Orden->getExtra());
            $consulta->execute();
            $this->Orden->setId( $conexion->lastInsertId() );
            $conexion = null;
            if($this->Orden->getId() != null && $this->Orden->getId() != 0){
                return $this->Orden;
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
        if($this->objetoCompleto() && $this->Orden->getId() != null &&  $this->Orden->getId() != 0 ){
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET '.self::STRING_MODIFICA.' WHERE id = :id');
            $consulta->bindParam(':id_creador', $this->Orden->getCreador()->getId());
            $consulta->bindParam(':id_plomero', $this->Orden->getPlomero()->getId());
            $consulta->bindParam(':id_medidor', $this->idValidoIdObjeto($this->Orden->getMedidor()));
            $consulta->bindParam(':id_medidorRetirado', $this->idValidoIdObjeto($this->Orden->getMedidorRetirado()));
            $consulta->bindParam(':id_llave', $this->idValidoIdObjeto($this->Orden->getLlave()));
            $consulta->bindParam(':nic', $this->Orden->getNic());
            $consulta->bindParam(':osCorte', $this->Orden->getOsCorte());
            $consulta->bindParam(':lecturaInicial', $this->Orden->getLecturaInicial());
            $consulta->bindParam(':estatus', $this->Orden->getEstatus());
            $consulta->bindParam(':fechaCorte', $this->Orden->getFechaCorte());
            $consulta->bindParam(':estado', $this->Orden->getEstado());
            $consulta->bindParam(':osReconexion', $this->Orden->getOsReconexion());
            $consulta->bindParam(':lecturaFinal', $this->Orden->getLecturaFinal());
            $consulta->bindParam(':fechaReconexion', $this->Orden->getFechaReconexion());
            $consulta->bindParam(':observacion', $this->Orden->getObservacion());
            $consulta->bindParam(':piezaRetirada', $this->Orden->getPiezaRetirada());
            $consulta->bindParam(':tipoOs', $this->Orden->getTipoOs());
            $consulta->bindParam(':fechaResolucion', $this->Orden->getFechaResolucion());
            $consulta->bindParam(':materiales', $this->Orden->getMateriales());
            $consulta->bindParam(':fechaCreacion', $this->Orden->getFechaCreacion());
            $consulta->bindParam(':tipoServicio', $this->Orden->getTipoServicio());
            $consulta->bindParam(':campoExtra', $this->Orden->getExtra());
            $consulta->bindParam(':id', $this->Orden->getId());
            $consulta->execute();
            $conexion = null;
            if($this->Orden->getId() != null){
                return $this->Orden;
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
        if($this->Orden->getId() != 0 && $this->Orden->getId() != null )
        {
            try{
                $consulta = $conexion->prepare( 'DELETE FROM ' . self::TABLA .' WHERE id = :parametro');
                $consulta->bindParam(':parametro', $this->Orden->getId());
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
        if ( $this->Orden->getId() != null )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE id = :id');
            $consulta->bindParam(':id', $this->Orden->getId());
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarObjeto($registro);
            }else{
                $this->Orden = null;
            }
        }else{
            $this->Orden = null;
        }
        $conexion = null;
        return $this->Orden;
    }

    public function consultarXNIC()
    {
        $conexion = FabricaEntidad::Conexion();;
        if ( $this->Orden->getNic() != null )
        {
            $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE nic = :id');
            $consulta->bindParam(':id', $this->Orden->getNIC());
            $consulta->execute();
            $registro = $consulta->fetch();
            if($registro){
                $this->armarObjeto($registro);
            }else{
                $this->Orden = null;
            }
        }else{
            $this->Orden = null;
        }
        $conexion = null;
        return $this->Orden;
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

    public function obtenerTodoDesc()
    {
        $conexion = FabricaEntidad::Conexion();;
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA .' order by 1 desc ');
        $consulta->execute();
        $Revisiones = $consulta->fetchAll();
        $conexion = null;
        $objetos = $this->armarListaObjetos($Revisiones);
        return $objetos;
    }


    public function obtenerTodoAsc()
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

        $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE '.$parametro.' = :id');
        $consulta->bindParam(':id', $valor);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            $this->armarObjeto($registro);
        }else{
            $this->Orden = null;
        }
        $conexion = null;
        return $this->Orden;

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
        if(($this->Orden->getCreador() != null && $this->Orden->getCreador()->getId() != null )
            && ($this->Orden->getPlomero() != null && $this->Orden->getPlomero()->getId() != null )
            && ($this->Orden->getFechaCreacion() != null && $this->Orden->getFechaCreacion() != '' )
            && ($this->Orden->getNIC() != null && $this->Orden->getNIC() != '' )
            && ($this->Orden->getTipoServicio() != null && $this->Orden->getTipoServicio() != '' )  )
        {
            return true;
        }else{
            return false;
        }
    }



    public function asignarLlave($id_llave, $NIC){
        $conexion = FabricaEntidad::Conexion();;

        if($id_llave != null &&  $id_llave != 0 &&  $NIC != 0 &&  $NIC != 0 ){
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET  id_llave = :id_llave  WHERE NIC = :NIC' );
            $consulta->bindParam(':id_llave', $id_llave);
            $consulta->bindParam(':NIC', $NIC);
            $consulta->execute();
            $conexion = null;
        }else{
            return null;
        }

    }

    public function asignarMedidor($NIC, $id_medidor){
        $conexion = FabricaEntidad::Conexion();;
        if($id_medidor != null &&  $id_medidor != 0 &&  $NIC != 0 &&  $NIC != 0 ){
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET  id_medidor = :id_medidor  WHERE nic = :id' );
            $consulta->bindParam(':id_medidor', $id_medidor);
            $consulta->bindParam(':id', $NIC);
            $consulta->execute();

            $consulta = $conexion->prepare('UPDATE medidores SET NIC = :NIC WHERE id = :id');
            $consulta->bindParam(':id', $id_medidor);
            $consulta->bindParam(':NIC', $NIC);
            $consulta->execute();
            $conexion = null;
        }else{
            return null;
        }

    }


    public function obtenerCreador($id_creador){

        $usuarioCreador = FabricaEntidad::entidadUsuario();
        $usuarioCreador->setId($id_creador);

        $dao = FabricaDao::obtenerDaoUsuario($usuarioCreador);
        $usuarioCreador = $dao->consultarXid();

        return $usuarioCreador;

    }

    public function obtenerPlomero($id_plomero){

        $plomero = FabricaEntidad::entidadPlomero();
        $plomero->setId($id_plomero);

        $dao = FabricaDao::obtenerDaoPlomero($plomero);
        $plomero = $dao->consultarXid();

        return $plomero;
    }

    public function obtenerLlave($id_llave){
        $llave = FabricaEntidad::entidadLlave();
        $llave->setId($id_llave);

        $dao = FabricaDao::obtenerDaoLlave($llave);
        $llave = $dao->consultarXid();

        return $llave;
    }

    public function obtenerMedidor($id_medidor){
        $medidor = FabricaEntidad::entidadMedidor();
        $medidor->setId($id_medidor);

        $dao = FabricaDao::obtenerDaoMedidor($medidor);
        $medidor = $dao->consultarXid();

        return $medidor;
    }

    public function obtenerMedidorRetirado($id_medidor){
        $medidor = FabricaEntidad::entidadMedidorRetirado();
        $medidor->setId($id_medidor);

        $dao = FabricaDao::obtenerDaoMedidorRetirado($medidor);
        $medidor = $dao->consultarXid();

        return $medidor;
    }

    private function armarObjeto($registro)
    {
        $this->Orden->setId($registro['id']);

        $this->Orden->setCreador($this->obtenerCreador($registro['id_creador']));
        $this->Orden->setPlomero($this->obtenerPlomero($registro['id_plomero']));
        $this->Orden->setLlave($this->obtenerLlave($registro['id_llave']));
        $this->Orden->setMedidor($this->obtenerMedidor($registro['id_medidor']));
        $this->Orden->setMedidorRetirado($this->obtenerMedidorRetirado($registro['id_medidorRetirado']));
        $this->Orden->setNic($registro['nic']);
        $this->Orden->setOsCorte($registro['osCorte']);
        $this->Orden->setLecturaInicial($registro['lecturaInicial']);
        $this->Orden->setEstatus($registro['estatus']);
        $this->Orden->setFechaCorte($registro['fechaCorte']);
        $this->Orden->setEstado($registro['estado']);
        $this->Orden->setOsReconexion($registro['osReconexion']);
        $this->Orden->setLecturaFinal($registro['lecturaFinal']);
        $this->Orden->setFechaReconexion($registro['fechaReconexion']);
        $this->Orden->setObservacion($registro['observacion']);
        $this->Orden->setPiezaRetirada($registro['piezaRetirada']);
        $this->Orden->setTipoOs($registro['tipoOs']);
        $this->Orden->setFechaResolucion($registro['fechaResolucion']);
        $this->Orden->setMateriales($registro['materiales']);
        $this->Orden->setFechaCreacion($registro['fechaCreacion']);
        $this->Orden->setTipoServicio($registro['tipoServicio']);
        $this->Orden->setExtra($registro['campoExtra']);

    }

    private function armarListaObjetos($Revisiones)
    {
        $pila = array();
        for($i=0;$i<count($Revisiones);$i++){
            $objeto = new Orden();

            $objeto->setId($Revisiones[$i]['id']);


            $objeto->setCreador($this->obtenerCreador($Revisiones[$i]['id_creador']));
            $objeto->setPlomero($this->obtenerPlomero($Revisiones[$i]['id_plomero']));
            $objeto->setLlave($this->obtenerLlave($Revisiones[$i]['id_llave']));
            $objeto->setMedidor($this->obtenerMedidor($Revisiones[$i]['id_medidor']));
            $objeto->setMedidorRetirado($this->obtenerMedidorRetirado($Revisiones[$i]['id_medidorRetirado']));
            $objeto->setNic($Revisiones[$i]['nic']);
            $objeto->setOsCorte($Revisiones[$i]['osCorte']);
            $objeto->setLecturaInicial($Revisiones[$i]['lecturaInicial']);
            $objeto->setEstatus($Revisiones[$i]['estatus']);
            $objeto->setFechaCorte($Revisiones[$i]['fechaCorte']);
            $objeto->setEstado($Revisiones[$i]['estado']);
            $objeto->setOsReconexion($Revisiones[$i]['osReconexion']);
            $objeto->setLecturaFinal($Revisiones[$i]['lecturaFinal']);
            $objeto->setFechaReconexion($Revisiones[$i]['fechaReconexion']);
            $objeto->setObservacion($Revisiones[$i]['observacion']);
            $objeto->setPiezaRetirada($Revisiones[$i]['piezaRetirada']);
            $objeto->setTipoOs($Revisiones[$i]['tipoOs']);
            $objeto->setFechaResolucion($Revisiones[$i]['fechaResolucion']);
            $objeto->setMateriales($Revisiones[$i]['materiales']);
            $objeto->setFechaCreacion($Revisiones[$i]['fechaCreacion']);
            $objeto->setTipoServicio($Revisiones[$i]['tipoServicio']);
            $objeto->setExtra($Revisiones[$i]['campoExtra']);

            array_push($pila, $objeto);
        }

        return $pila;
    }

    private function idValidoIdObjeto($objeto)
    {
        if($objeto != null){
            return $objeto->getId();
        }else{
            return null;
        }
    }


}
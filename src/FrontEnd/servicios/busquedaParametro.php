<?php
include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';
session_start();

if(isset($_SESSION['parametro'])){
    $parametro = $_SESSION['parametro'];
}
if(isset($_SESSION['valor'])){
    $valor = $_SESSION['valor'];
}

if(isset($parametro)){
    if ($parametro == '*')
    {
        $dao = FabricaDao::obtenerDaoOrden(FabricaEntidad::entidadOrden());
        $Resultado = $dao->obtenerTodoDesc();
    }else{
        $dao = FabricaDao::obtenerDaoOrden(FabricaEntidad::entidadOrden());
        $Resultado = $dao->consultarXParametro($parametro, $valor);
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tesis</title>
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
<script>


    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

</script>
<header>
    <nav>
        <div class="nav-wrapper">
            <a href="../menu.php" class="brand-logo center">Sistema de registro y control</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="../recurso/asignar.php">Recursos</a>
                </li>
                <li><a href="index.php">Servicios</a>
                </li>
            </ul>
        </div>
    </nav>

</header>

<section class="container section white">
    <div class="center" style="color: red;">
        <?php if (isset($_GET[ "servicioAgregado"]))
        {
            if ($_GET[ "servicioAgregado"]=="si" )
            { echo '*Servicio Agregado Sastisfactoriamente*';
            }else{ echo '* El Servicio no pudo ser agregado*';
            }
        }
        ?>

    </div>
    <div class="row col s12">
        <div class="center waves-color-demo ">
            <div class="row">
                <a href="index.php" class="waves-effect waves-red btn-large waves-color-demo">AGREGAR</a>
                <a href="busquedaServicio.php" class="waves-effect waves-red btn-large waves-color-demo" >BUSCAR</a>
                <a href="#!" class="waves-effect waves-red btn-large waves-color-demo">IMPRIMIR</a>
                <a href="../menu.php" class="waves-effect waves-red btn-large waves-color-demo">REGRESAR</a>
                <a href="../index.php" class="waves-effect waves-red btn-large waves-color-demo">SALIR</a>
            </div>



            <div id="buscar">
                <div class="row">
                    <form action="_busquedaServicioBean.php" method="POST">
                    <div class="row" id="busqueda_valor">



                        <div class="col s12">

                            <div class="center">
                                <h2>Servicios</h2>
                                <h5>Por medio de esta opcion se Podra buscar para editar los servicios</h5>
                            </div>

                            <div class="col s4">
                            </div>
                            <div class="col s4">
                                <input name="valor" placeholder="NIC"  type="text" class="validate">
                                <input name="parametro" placeholder="Valor de la busqueda"  type="hidden" value="nic" class="validate">
                            </div>
                        </div>
                        <div class="row">

                            <button class="waves-effect waves-red btn-large waves-color-demo" type="submit" name="action">Buscar!
                                <i class="mdi-content-send right"></i>
                            </button>
                        </div>
                    </div>
                    <div id="busqueda_detalle">
                        <div style="color: red">
                            <?php if (isset($_GET[ "vacio"]))
                            {
                                if ($_GET[ "vacio"]=="si" )
                                { echo '*No se encontro ningun valor que sastisfaga los parametros ingresados*';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                </form>

        </div>
    </div >

        <div style=" overflow-y:scroll; width: auto;">

            <div class="center waves-color-demo ">
                <?php
                if(  isset($Resultado)){;
                    ?>
                    <table class="striped centered responsive-table">
                        <thead>
                        <tr class="centered">
                            <th data-field="num">N°</th>
                            <th data-field="tipoServicio">Tipo de Servicio</th>
                            <th data-field="NIC">NIC</th>
                            <th data-field="Plomero">Plomero</th>
                            <th data-field="os/Corte">os/Corte</th>
                            <th data-field="lectura_inicial">Lectura inicial</th>
                            <th data-field="estatus"> Estatus</th>
                            <th data-field="fecha_corte">Fecha de corte </th>
                            <th data-field="estado">Estado</th>
                            <th data-field="os_reconexion">O/S reconexion</th>
                            <th data-field="lectura_final"> Lectura final</th>
                            <th data-field="fecha_reconexion">Fecha de reconexion</th>
                            <th data-field="piezaRetirada">Pieza retirada</th>
                            <th data-field="observacion">Observacion</th>
                            <th data-field="tipoOs"> Tipo os</th>
                            <th data-field="fechaResolucion">fechaResolucion</th>
                            <th data-field="materiales">Materiales</th>
                            <th data-field="fechaCreacion">fechaCreacion</th>
                            <th data-field="llave">Llave Asignada</th>
                            <th data-field="medidor">Medidor Asignado</th>
                            <th data-field="medidorRetirado">Medidor Retirado</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                     //   foreach( $Resultado as $orden):
                            ?>
                            <tr>
                                <td><?php echo $Resultado->getId();?> </td>
                                <td><?php echo $Resultado->getTipoServicio();?> </td>
                                <td><?php echo $Resultado->getNic();?> </td>
                                <td><?php echo $Resultado->getPlomero()->getNombre();?> </td>
                                <td><?php echo $Resultado->getOsCorte();?> </td>
                                <td><?php echo $Resultado->getLecturaInicial();?> </td>
                                <td><?php echo $Resultado->getEstatus();?> </td>
                                <td><?php echo $Resultado->getFechaCorte();?> </td>
                                <td><?php echo $Resultado->getEstado();?> </td>
                                <td><?php echo $Resultado->getOsReconexion();?>
                                <td><?php echo $Resultado->getLecturaFinal();?> </td>
                                <td><?php echo $Resultado->getFechaReconexion();?> </td>
                                <td><?php echo $Resultado->getPiezaRetirada();?>
                                <td><?php echo $Resultado->getObservacion();?>
                                <td><?php echo $Resultado->getTipoOs();?> </td>
                                <td><?php echo $Resultado->getFechaResolucion();?> </td>
                                <td><?php echo $Resultado->getMateriales();?>
                                <td><?php echo $Resultado->getFechaCreacion();?>
                                <td>
                                    <?php
                                    if($Resultado->getLlave() != null){
                                        echo $Resultado->getLlave()->getNombre();
                                    }else{
                                        echo "S/N";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($Resultado->getMedidor() != null){
                                        echo $Resultado->getMedidor()->getSerial();
                                    }else{
                                        echo "S/N";
                                    }
                                    ?>
                                <td>

                                    <?php
                                    if($Resultado->getMedidorRetirado() != null){
                                        echo $Resultado->getMedidorRetirado()->getSerial();
                                    }else{
                                        echo "S/N";
                                    }
                                    ?>


                                    <?php if(isset($_SESSION['usuarioLogeado'])){
                                    if($_SESSION['usuarioLogeado']->getTipo() == 'ADMINISTRADOR'){
                                    ?>

                                <td>
                                    <button class="waves-effect waves-red btn-large waves-color-demo">
                                        <a href="_modificarBean.php?id=<?php echo $Resultado->getId();?>">Editar!</a>
                                    </button>
                                </td>
                                <td>

                                    <button class="waves-effect waves-red btn-large waves-color-demo">
                                        <a href="_eliminarServicioBean.php?id=<?php echo $Resultado->getId();?>">Eliminar!</a>
                                    </button>
                                </td>
                                <?php
                                }
                                }

                                ?>



                            </tr>


                        <?php //endforeach;
                        ?>
                        </tbody>
                    </table>

                <?php }
                ?>
            </div>
        </div>


    <div class="row col s12">
            <div class="row">
                <a class="waves-effect waves-red btn-large waves-color-demo" href="index.php">Regresar</a>
            </div>
    </div>
</section>



<footer class="page-footer">
    <div class="container">
        <div class="row center">
            <div class="col l12 s12">
                <h5 class="white-text">Gleidis</h5>
                <p class="grey-text text-lighten-4">Tesis registro y control.</p>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container center">
            © 2015 Copyright
        </div>
    </div>
</footer>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>
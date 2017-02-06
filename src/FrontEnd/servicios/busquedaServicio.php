<?php
include_once ('_busquedaServicioBean.php');
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
                                <input name="parametro"   type="hidden" value="nic" class="validate">
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
                        foreach( $Resultado as $orden):
                            ?>
                            <tr>
                                <td><?php echo $orden->getId();?> </td>
                                <td><?php echo $orden->getTipoServicio();?> </td>
                                <td><?php echo $orden->getNic();?> </td>
                                <td><?php echo $orden->getPlomero()->getNombre();?> </td>
                                <td><?php echo $orden->getOsCorte();?> </td>
                                <td><?php echo $orden->getLecturaInicial();?> </td>
                                <td><?php echo $orden->getEstatus();?> </td>
                                <td><?php echo $orden->getFechaCorte();?> </td>
                                <td><?php echo $orden->getEstado();?> </td>
                                <td><?php echo $orden->getOsReconexion();?>
                                <td><?php echo $orden->getLecturaFinal();?> </td>
                                <td><?php echo $orden->getFechaReconexion();?> </td>
                                <td><?php echo $orden->getPiezaRetirada();?>
                                <td><?php echo $orden->getObservacion();?>
                                <td><?php echo $orden->getTipoOs();?> </td>
                                <td><?php echo $orden->getFechaResolucion();?> </td>
                                <td><?php echo $orden->getMateriales();?>
                                <td><?php echo $orden->getFechaCreacion();?>
                                <td>
                                    <?php
                                    if($orden->getLlave() != null){
                                        echo $orden->getLlave()->getNombre();
                                    }else{
                                        echo "S/N";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($orden->getMedidor() != null){
                                        echo $orden->getMedidor()->getSerial();
                                    }else{
                                        echo "S/N";
                                    }
                                    ?>
                                <td>

                                    <?php
                                    if($orden->getMedidorRetirado() != null){
                                        echo $orden->getMedidorRetirado()->getSerial();
                                    }else{
                                        echo "S/N";
                                    }
                                    ?>

                                <?php if(isset($_SESSION['usuarioLogeado'])){
                                        if($_SESSION['usuarioLogeado']->getTipo() == 'ADMINISTRADOR'){
                                            ?>



                                <td>
                                    <a href="_modificarBean.php?id=<?php echo $orden->getId();?>">Editar!</a>
                                </td>
                                <td>
                                    <a href="_eliminarServicioBean.php?id=<?php echo $orden->getId();?>">Eliminar!</a>

                                </td>
                                        <?php
                                        }
                                    }


                                    ?>
                            </tr>


                        <?php endforeach;
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
<?php
include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';
$Plomeros = FabricaEntidad::entidadPlomero();
$dao = FabricaDao::obtenerDaoPlomero($Plomeros);
$Plomeros = $dao->obtenerTodos();

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


            <div id="asignar" >

                <div class="row" >
                    <div class="input-field col s6">
                        <select class="browser-default" name="tipoServicio" onchange="location = this.value" required="">
                            <option value="formSuspension.php">Suspension</option>
                            <option value="formSellado.php">Sellado</option>
                            <option value="formInhabilitacion.php" selected>Inhabilitacion</option>
                            <option value="formRevision.php">Revision de cortes</option>
                            <option value="formVarios.php">Trabajos varios</option>
                            <option value="formReconexion.php">Reconexiones fuera de gestion</option>
                        </select>
                    </div>
                </div>

            </div>

            <?php if( isset($_GET['id'])){
                $orden = FabricaEntidad::entidadOrden();
                $orden->setId($_GET['id']);
                $dao = FabricaDao::obtenerDaoOrden($orden);
                $orden = $dao->consultarXid();

                ?>
                <form action="_indexServicioBean.php" id="inhabilitacionForm" method="post">
                    <div class="row">
                        <div  style="display:block;">
                            <div class="input-field col s4">
                                <input  value="<?php echo $orden->getNic();?>" disabled placeholder="Numero de contrato" type="text" class="validate">
                                <input  value="<?php echo $orden->getNic();?>" disabled placeholder="Numero de contrato" name="nic" type="hidden" name="nic" class="validate">
                            </div>
                        </div>
                    </div>
                    <table class="striped centered responsive-table">
                        <thead>
                        <tr class="centered">
                            <th data-field="plomero">Plomero</th>
                            <th data-field="os_corte"> O/S Corte</th>
                            <th data-field="lectura_inicial">Lectura inicial</th>
                            <th data-field="estatus"> Estatus</th>
                            <th data-field="fecha_corte">Fecha de corte </th>
                            <th data-field="estado">Estado</th>
                            <th data-field="os_reconexion">O/S reconexion</th>
                            <th data-field="lectura_final"> Lectura final</th>
                            <th data-field="fecha_reconexion">Fecha de reconexion</th>
                            <th data-field="piezaRetirada">Pieza retirada</th>
                            <th data-field="observacion">Observacion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <input name="tipoServicio" type="hidden" value="INHABILITACION" class="validate center">
                            <input name="id" type="hidden" value="<?php echo $orden->getId();?>" class="validate center">

                            <td>
                                <select class="browser-default" name="plomero" required>
                                    <option value="<?php echo $orden->getPlomero()->getId();?>"><?php echo $orden->getPlomero()->getCodigo();?></option>
                                    <?php foreach($Plomeros as $items):?>
                                        <option value="<?php echo $items->getId();?>">
                                            <?php echo $items->getCodigo() ?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td>
                                <input required name="osCorte" value="<?php echo $orden->getOsCorte();?>" placeholder="os/corte" type="text" class="validate center">
                            </td>
                            <td>
                                <input required name="lecturaInicial" value="<?php echo $orden->getLecturaInicial();?>" placeholder="Lectura inicial" type="text" class="validate center">
                            </td>

                            <td>
                                <input required name="estatus" value="<?php echo $orden->getEstatus();?>" placeholder="estatus" type="text" class="validate center">
                            </td>

                            <td>
                                <input required  type="date" value="<?php echo $orden->getFechaCorte();?>" class="datepicker" name="fechaCorte" >
                            </td>

                            <td>
                                <input required name="estado" value="<?php echo $orden->getEstado();?>"placeholder="estado" type="text" class="validate center">
                            </td>

                            <td>
                                <input required name="osReconexion" value="<?php echo $orden->getOsReconexion();?>" placeholder="os_reconexion" type="text" class="validate center">
                            </td>

                            <td>
                                <input required name="lecturaFinal" value="<?php echo $orden->getLecturaFinal();?>" placeholder="lectura_final" type="text" class="validate center">
                            </td>

                            <td>
                                <input required type="date" class="datepicker"  value="<?php echo $orden->getFechaReconexion();?>" name="fechaReconexion">

                            </td>

                            <td>
                                <input required name="piezaRetirada" value="<?php echo $orden->getPiezaRetirada();?>" placeholder="piezaRetirada" type="text" class="validate center">
                            </td>

                            <td>
                                <input required name="observacion" value="<?php echo $orden->getObservacion();?>" placeholder="observacion" type="text" class="validate center">
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>

                    <div class=" row center">
                        <button class="waves-effect waves-red btn-large waves-color-demo" type="submit" name="action">Guardar
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>

                </form>



            <?php
       }else



            {

                ?>

                <form action="_indexServicioBean.php" id="inhabilitacionForm" method="post">
                    <div class="row">
                        <div  style="display:block;">
                            <div class="input-field col s4">
                                <input placeholder="Numero de contrato" name="nic" type="text" class="validate" required>
                            </div>
                        </div>
                    </div>
                    <table class="striped centered responsive-table">
                        <thead>
                        <tr class="centered">
                            <th data-field="plomero">Plomero</th>
                            <th data-field="os_corte"> O/S Corte</th>
                            <th data-field="lectura_inicial">Lectura inicial</th>
                            <th data-field="estatus"> Estatus</th>
                            <th data-field="fecha_corte">Fecha de corte </th>
                            <th data-field="estado">Estado</th>
                            <th data-field="os_reconexion">O/S reconexion</th>
                            <th data-field="lectura_final"> Lectura final</th>
                            <th data-field="fecha_reconexion">Fecha de reconexion</th>
                            <th data-field="piezaRetirada">Pieza retirada</th>
                            <th data-field="observacion">Observacion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <input name="tipoServicio" type="hidden" value="INHABILITACION" class="validate center">

                            <td>
                                <select class="browser-default" name="plomero" required>
                                    <option value="" disabled selected>Seleccione Plomero</option>
                                    <?php foreach($Plomeros as $items):?>
                                        <option value="<?php echo $items->getId();?>">
                                            <?php echo $items->getCodigo() ?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td>
                                <input required name="osCorte" placeholder="os/corte" type="text" class="validate center">
                            </td>
                            <td>
                                <input required name="lecturaInicial" placeholder="Lectura inicial" type="text" class="validate center">
                            </td>

                            <td>
                                <input required name="estatus" placeholder="estatus" type="text" class="validate center">
                            </td>

                            <td>
                                <input required  type="date" class="datepicker" name="fechaCorte" >
                            </td>

                            <td>
                                <input required name="estado" placeholder="estado" type="text" class="validate center">
                            </td>

                            <td>
                                <input required name="osReconexion" placeholder="os_reconexion" type="text" class="validate center">
                            </td>

                            <td>
                                <input required name="lecturaFinal" placeholder="lectura_final" type="text" class="validate center">
                            </td>

                            <td>
                                <input required type="date" class="datepicker" name="fechaReconexion">

                            </td>

                            <td>
                                <input required name="piezaRetirada" placeholder="piezaRetirada" type="text" class="validate center">
                            </td>

                            <td>
                                <input required name="observacion" placeholder="observacion" type="text" class="validate center">
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>

                    <div class=" row center">
                        <button class="waves-effect waves-red btn-large waves-color-demo" type="submit" name="action">Procesar
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>

                </form>
            <?php
            } ?>

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
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
                            <option value="formInhabilitacion.php">Inhabilitacion</option>
                            <option value="formRevision.php">Revision de cortes</option>
                            <option value="formVarios.php" selected>Trabajos varios</option>
                            <option value="formReconexion.php">Reconexiones fuera de gestion</option>
                        </select>
                    </div>
                </div>

            </div>

            <form action="_indexServicioBean.php" id="variosForm" method="POST">
                <div class="row">
                    <div style="display:block;">
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
                        <th data-field="tipoOS">Tipo O/S</th>
                        <th data-field="lectura_final">Fecha Resolucion</th>
                        <th data-field="fecha_reconexion">Materiales</th>
                        <th data-field="observacion">Observacion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <input required name="tipoServicio" type="hidden" class="validate center" value="VARIOS">
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
                            <input required name="lecturaInicial" placeholder="Lectura Inicial" type="text" class="validate center">
                        </td>
                        <td>
                            <input required name="tipoOs" placeholder="tipoOs" type="text" class="validate center">
                        </td>

                        <td>
                            <input required type="date" class="datepicker" name="fechaResolucion">
                        </td>
                        <td>
                            <input required name="materiales" placeholder="materiales" type="text" class="validate center">
                        </td>

                        <td>
                            <input required name="observacion" placeholder="observacion" type="text" class="validate center">
                        </td>

                    </tbody>
                </table>
                <br>
                <br>
                <br>

                <div class=" row center">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Procesar
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>

            </form>

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